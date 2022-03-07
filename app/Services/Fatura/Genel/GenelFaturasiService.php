<?php


namespace App\Services\Fatura\Genel;


use App\Contracts\FaturaInterface;
use App\Models\Abone;
use App\Models\Ayar;
use App\Models\AyarEkKalem;
use App\Models\Fatura;
use App\Services\Fatura\AbstractFatura;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Onrslu\HtEfatura\Models\Invoice;
use Onrslu\HtEfatura\Models\InvoiceLine;
use Onrslu\HtEfatura\Models\InvoiceLines;
use Onrslu\HtEfatura\Models\LineTax;
use Onrslu\HtEfatura\Models\LineTaxes;
use Onrslu\HtEfatura\Models\PaymentMeans;
use Onrslu\HtEfatura\Types\Enums\QuantityUnitUser;
use Onrslu\HtEfatura\Types\Enums\TaxTypeCode;
use Onrslu\HtEfatura\Types\PriceModifiers\Percentage;
use Throwable;

class GenelFaturasiService extends AbstractFatura
{
    /**
     * @param FaturaInterface $faturaTaslagi
     * @param int[] $selectedEkKalemler
     * @return Invoice
     * @throws Throwable
     */
    protected function getInvoice(FaturaInterface $faturaTaslagi, array $selectedEkKalemler)
    {
        $values = [
            'tuketim'   =>
                0
        ];

        
        $invoiceEkKalemler      = $this->getEkKalemler(
                                            0,
                                            Abone::COLUMN_TUR_GENEL,
                                            $selectedEkKalemler,
                                            new QuantityUnitUser('MTQ')
                                );
        $invoiceKalemler        = $invoiceEkKalemler;

        // Invoice Lines
        $invoiceLines = new InvoiceLines($invoiceKalemler);

        $invoice = parent::createInvoice($faturaTaslagi, $invoiceLines);

        return $invoice;
    }

    /**
     * @param $values
     * @return InvoiceLine
     * @throws Throwable
     */

    /**
     * @param FaturaInterface $fatura
     * @return string
     */
    protected function getAboneAndSayacNotes(FaturaInterface $fatura) : string
    {
        $note = '';

        if ($fatura->abone->{Abone::COLUMN_ABONE_NO})
        {
            $note   .="\n";
        }

        return $note;
    }

    /**
     * @return float
     */
    protected function getKdvPercentage(): float
    {
        return 0.18;
    }

    /**
     * @param Carbon $paymentDueDate
     * @return PaymentMeans
     */
    protected function getPaymentMeans(Carbon $paymentDueDate) : PaymentMeans
    {
        return parent::generatePaymentMeans(
            $paymentDueDate,
            Ayar::where(Ayar::COLUMN_BASLIK, Ayar::FIELD_GENEL_BANKA_IBAN)
                ->value(Ayar::COLUMN_DEGER)
        );
    }

    /**
     * @inheritDoc
     */
    public static function getRedirectToPayPage(array $params): View
    {
        return view(
            'import.fatura.genel.redirectToPay',
            [
                'params' => $params,
                'ekKalemler' => [
                    'genel' => AyarEkKalem::where(
                        AyarEkKalem::COLUMN_TUR,
                        'genel'
                    )->get(),
                ]
            ]
        );
    }
}
