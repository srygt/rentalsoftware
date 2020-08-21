<?php


namespace App\Services\Fatura\Elektrik;


use App\Contracts\FaturaInterface;
use App\Models\Fatura;
use App\Services\Fatura\AbstractFatura;
use Onrslu\HtEfatura\Models\Invoice;
use Onrslu\HtEfatura\Models\InvoiceLine;
use Onrslu\HtEfatura\Models\InvoiceLines;
use Onrslu\HtEfatura\Models\LineTax;
use Onrslu\HtEfatura\Models\LineTaxes;
use Onrslu\HtEfatura\Types\Enums\QuantityUnitUser;
use Onrslu\HtEfatura\Types\Enums\TaxTypeCode;
use Onrslu\HtEfatura\Types\PriceModifiers\Percentage;
use Throwable;

class ElektrikFaturasiService extends AbstractFatura
{
    /**
     * @param FaturaInterface $faturaTaslagi
     * @return Invoice
     * @throws Throwable
     */
    protected function getInvoice(FaturaInterface $faturaTaslagi)
    {
        $values = [
            'tuketim'   =>
                $faturaTaslagi->{Fatura::COLUMN_ENDEKS_SON} - $faturaTaslagi->{Fatura::COLUMN_ENDEKS_ILK}, // Kwh, m3
            'bedel'     => [
                'elektrikTuketim'   => $faturaTaslagi->{Fatura::COLUMN_BIRIM_FIYAT_TUKETIM},
                'dagitim'           => $faturaTaslagi->{Fatura::COLUMN_BIRIM_FIYAT_DAGITIM},
                'sistemKullanim'    => $faturaTaslagi->{Fatura::COLUMN_BIRIM_FIYAT_SISTEM},
            ]
        ];

        $invoiceLineElektrikTuketim         = $this->getElektrikTuketim($values);
        $invoiceLineDagitimBedeli           = $this->getDagitimBedeli($values);
        $invoiceLineSistemKullanimBedeli    = $this->getSistemKullanimBedeli($values);

        // Invoice Lines
        $invoiceLines = new InvoiceLines([
            $invoiceLineElektrikTuketim,
            $invoiceLineDagitimBedeli,
            $invoiceLineSistemKullanimBedeli,
        ]);

        $invoice = parent::createInvoice($faturaTaslagi, $invoiceLines);

        return $invoice;
    }

    /**
     * @param $values
     * @return InvoiceLine
     * @throws Throwable
     */
    protected function getElektrikTuketim($values)
    {
        // Elektrik Tüketim Bedeli
        $invoiceLineElektrikTuketim = new InvoiceLine();
        $invoiceLineElektrikTuketim
            ->setId(1)
            ->setItemName('Elektrik Tüketim Bedeli')
            ->setPriceAmount($values['bedel']['elektrikTuketim'])
            ->setQuantityAmount($values['tuketim'])
            ->setQuantityUnitUser(new QuantityUnitUser('KWH'));

        $taxTrt = (new LineTax())
            ->setTax(
                new Percentage(0.02, $invoiceLineElektrikTuketim->getPriceTotalWithoutTaxes())
            )
            ->setTaxCode(new TaxTypeCode(TaxTypeCode::TRT_PAYI))
            ->setTaxName('TRT Payı');

        $taxEnergy = (new LineTax())
            ->setTax(
                new Percentage(0.01, $invoiceLineElektrikTuketim->getPriceTotalWithoutTaxes())
            )
            ->setTaxCode(new TaxTypeCode(TaxTypeCode::ENERJI_FONU))
            ->setTaxName('Enerji Fonu');

        $taxKdv = (new LineTax())
            ->setTax(
                new Percentage(
                    0.18,
                    $invoiceLineElektrikTuketim->getPriceTotalWithoutTaxes()
                    + $taxEnergy->getTaxAmnt()
                    + $taxTrt->getTaxAmnt()
                )
            )
            ->setTaxCode(new TaxTypeCode(TaxTypeCode::KDV_GERCEK))
            ->setTaxName('KDV');

        $elektrikTuketimTaxes = new LineTaxes([
            $taxTrt,
            $taxEnergy,
            $taxKdv,
        ]);

        $invoiceLineElektrikTuketim->setLineTaxes($elektrikTuketimTaxes);

        return $invoiceLineElektrikTuketim;
    }

    /**
     * @param $values
     * @return InvoiceLine
     * @throws Throwable
     */
    protected function getDagitimBedeli($values)
    {
        // Dağıtım Bedeli
        $invoiceLineDagitimBedeli = new InvoiceLine();
        $invoiceLineDagitimBedeli
            ->setId(2)
            ->setItemName('Dağıtım Bedeli')
            ->setPriceAmount($values['bedel']['dagitim'])
            ->setQuantityAmount($values['tuketim'])
            ->setQuantityUnitUser(new QuantityUnitUser('KWH'));

        $taxKdv = (new LineTax())
            ->setTax(new Percentage(0.18, $invoiceLineDagitimBedeli->getPriceTotalWithoutTaxes()))
            ->setTaxCode(new TaxTypeCode(TaxTypeCode::KDV_GERCEK))
            ->setTaxName('KDV');

        $dagitimBedeliTaxes = new LineTaxes([
            $taxKdv,
        ]);

        $invoiceLineDagitimBedeli->setLineTaxes($dagitimBedeliTaxes);

        return $invoiceLineDagitimBedeli;
    }

    /**
     * @param $values
     * @return InvoiceLine
     * @throws Throwable
     */
    protected function getSistemKullanimBedeli($values)
    {
        // Sistem Kullanım Bedeli
        $invoiceLineSistemKullanimBedeli = new InvoiceLine();
        $invoiceLineSistemKullanimBedeli
            ->setId(3)
            ->setItemName('Sistem Kullanım Bedeli')
            ->setPriceAmount($values['bedel']['sistemKullanim'])
            ->setQuantityAmount($values['tuketim'])
            ->setQuantityUnitUser(new QuantityUnitUser('KWH'));

        $taxKdv = (new LineTax())
            ->setTax(new Percentage(0.18, $invoiceLineSistemKullanimBedeli->getPriceTotalWithoutTaxes()))
            ->setTaxCode(new TaxTypeCode(TaxTypeCode::KDV_GERCEK))
            ->setTaxName('KDV');

        $sistemKullanimBedeliTaxes = new LineTaxes([
            $taxKdv,
        ]);

        $invoiceLineSistemKullanimBedeli->setLineTaxes($sistemKullanimBedeliTaxes);

        return $invoiceLineSistemKullanimBedeli;
    }
}
