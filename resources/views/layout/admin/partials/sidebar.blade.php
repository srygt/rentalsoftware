<header class="main-nav">
    <div class="sidebar-user text-center">
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600">Serdar YİĞİT</h6></a>
        <p class="mb-0 font-roboto">Genel Müdür</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Geri</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title "{{ Request::segment(2) === 'ik' ? 'active open' : null }}" href="javascript:void(0)"><i data-feather="box"></i><span>İK Yönetimi</span></a>
                        <ul class="nav-submenu menu-content">
                            <li
                            class="{{ Request::segment(2) === 'ik' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                        >
                            <a href="{{route('fatura.gelen.liste')}}">Gelen Fatura Raporları</a>
                        </li>
                        <li
                            class="{{ Request::segment(2) === 'ik' && Request::segment(3) == 'giden-rapor' ? 'active' : null }}"
                        >
                            <a href="{{route('fatura.giden.rapor')}}">Giden Fatura Raporları</a>
                        </li>
                        <li
                            class="{{ Request::segment(2) === 'ik' && Request::segment(3) == '' ? 'active' : null }}"
                        >
                            <a href="{{route('fatura.liste')}}">Giden Fatura Listesi</a>
                        </li>
                        <li
                            class="{{ Request::segment(2) === 'ik' && Request::segment(3) === 'ekle' ? 'active' : null }}"
                        >
                            <a href="{{route('faturataslak.ekle.get')}}">Fatura Olustur</a>
                        </li>
                        <li
                            class="{{ Request::segment(2) === 'ik' && Request::segment(3) == '' ? 'active' : null }}"
                        >
                            <a href="{{route('faturaodeme.liste')}}">Fatura Ödeme Listesi</a>
                        </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title uppercase"{{ Request::segment(2) === 'tanim' ? 'active open' : null }}" lang="tr" href="javascript:void(0)"><i data-feather="list"></i><span>Tanımlar</span></a>
                        <ul class="nav-submenu menu-content">
                            <li
                                class="{{ Request::segment(2) === 'tanim' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                            >
                                <a href="{{route('tanim.kiralamaturu.liste')}}"><i class="icofont icofont-dotted-right"></i> Kiralama Türleri</a>
                            </li>
                            <li
                                class="{{ Request::segment(2) === 'tanim' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                            >
                                <a href="{{route('tanim.yakatipi.liste')}}"><i class="icofont icofont-dotted-right"></i> Yaka Tipleri</a>
                            </li>    
                            <li
                                class="{{ Request::segment(2) === 'tanim' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                            >
                                <a href="{{route('tanim.beden.liste')}}"><i class="icofont icofont-dotted-right"></i> Beden Tipleri</a>
                            </li>   
                            <li
                                class="{{ Request::segment(2) === 'tanim' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                            >
                                <a href="{{route('tanim.vucuttipi.liste')}}"><i class="icofont icofont-dotted-right"></i> Vücut Tipleri</a>
                            </li>    
                            <li
                                class="{{ Request::segment(2) === 'tanim' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                            >
                                <a href="{{route('tanim.renk.liste')}}"><i class="icofont icofont-dotted-right"></i> Renkler</a>
                            </li>    
                            <li
                                class="{{ Request::segment(2) === 'tanim' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                            >
                                <a href="{{route('tanim.marka.liste')}}"><i class="icofont icofont-dotted-right"></i> Markalar</a>
                            </li>   
                            <li
                                class="{{ Request::segment(2) === 'tanim' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                            >
                                <a href="{{route('tanim.materyal.liste')}}"><i class="icofont icofont-dotted-right"></i> Materyaller</a>
                            </li>      
                            <li
                                class="{{ Request::segment(2) === 'tanim' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                            >
                                <a href="{{route('tanim.kesimtipi.liste')}}"><i class="icofont icofont-dotted-right"></i> Kesim Tipi</a>
                            </li> 
                            <li
                                class="{{ Request::segment(2) === 'tanim' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                            >
                                <a href="{{route('tanim.stil.liste')}}"><i class="icofont icofont-dotted-right"></i> Stiller</a>
                            </li>  
                            <li
                                class="{{ Request::segment(2) === 'tanim' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                            >
                                <a href="{{route('tanim.etekkesimi.liste')}}"><i class="icofont icofont-dotted-right"></i> Etek Kesimi</a>
                            </li>   
                            <li
                                class="{{ Request::segment(2) === 'tanim' && Request::segment(3) == 'gelen' ? 'active' : null }}"
                            >
                                <a href="{{route('tanim.koltipi.liste')}}"><i class="icofont icofont-dotted-right"></i> Kol Tipi</a>
                            </li>                                                                                                                                                                                                                                                                                             
                        </ul>
                    </li>                    
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
