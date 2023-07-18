<!-- ========== App Menu ========== -->
<?php 
$currentPage = url()->current();
 function isActivePage($pageName) {
     echo $currentPage;exit;

    global $currentPage;
     echo ($currentPage === $pageName) ? 'actie' : '';
}
?>
<div  class="app-menu navbar-menu border-end">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{url('admin/dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/esd_favicon.png') }}" alt="" height="25">
            </span>
            <span class="logo-lg">
                 <img src="{{ URL::asset('build/images/ESD_logo.png') }}" alt="" height="50">
            </span>
        </a>
         <!-- Light Logo-->
        <a href="{{url('admin\dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                 <img src="{{ URL::asset('build/images/esd_favicon.png') }}" alt="" height="25">
            </span>
            <span class="logo-lg">
                 <img src="{{ URL::asset('build/images/ESD_logo.png') }}" alt="" height="50">
            </span>
        </a>
         <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
         </button>
    </div>

     <div id="scrollbar">
        <div class="container-fluid">

             <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                 <li class="nav-item">
                    <a class="nav-link menu-link <?php echo  url()->current() === url('admin/dashboard') ? 'active' : ''; ?>" href="{{url('admin/dashboard')}}">
                        <i class="ri-home-3-line"></i> <span>@lang('translation.dashboard')</span>
                     </a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('admin/partners')}}">
                        <i class="ri-user-heart-line"></i> <span>Partners</span>
                     </a>

                </li>
 
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('admin/serviceIndex')}}">
                         <i class="ri-equalizer-line"></i> <span>Services</span>
                    </a>

                 </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps5" data-bs-toggle="collapse" role="button">
                         <i class="ri-article-line"></i> <span>Projects</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps5">
                         <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('admin/collaborate_portfolio')}}" class="nav-link">All</a>
                             </li>
                            <li class="nav-item">
                                <a href="{{url('admin/portfolio_projects')}}" class="nav-link">Portfolo</a>
                             </li>
                            <li class="nav-item">
                                <a href="{{url('admin/archive_projects')}}" class="nav-link">Archived</a>
                             </li>
                        </ul>
                    </div>
                 </li>
 
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('admin/communicate_message')}}">
                         <i class="ri-message-line"></i> <span>Communicate</span>
                    </a>
                </li>
 
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps1" data-bs-toggle="collapse" role="button">
                         <i class="ri-article-line"></i> <span>Content</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps1">
                         <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('admin/content/converge')}}" class="nav-link">Converge</a>
                             </li>
                            <li class="nav-item">
                                <a href="{{url('admin/content/collaborate')}}" class="nav-link">Collaborate</a>
                             </li>
                            <li class="nav-item">
                                <a href="{{url('admin/heading/cache')}}" class="nav-link">Cache</a>
                             </li>
                            <li class="nav-item">
                                <a href="{{url('admin/content/cogitate')}}" class="nav-link">Cogitate</a>
                             </li>
                            <li class="nav-item">
                                <a href="{{url('admin/heading/communicate')}}" class="nav-link">Communicate</a>
                             </li>
                        </ul>
                    </div>
                 </li>

                <!-- //OTHERS -->
                 <li class="menu-title"><span>@lang('translation.menu')</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                         <i data-feather="grid" class="icon-dual"></i> <span>@lang('translation.apps')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                         <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('admin/apps-calendar')}}" class="nav-link">@lang('translation.calendar')</a>
                             </li>
                            <li class="nav-item">
                                <a href="{{url('admin/apps-chat')}}" class="nav-link">@lang('translation.chat')</a>
                             </li>
                            <li class="nav-item">
                                <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEmail">
                                     @lang('translation.email')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEmail">
                                     <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-mailbox')}}" class="nav-link">@lang('translation.mailbox')</a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="#sidebaremailTemplates" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebaremailTemplates">
                                                 @lang('translation.email-templates')
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebaremailTemplates">
                                                 <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="{{url('admin/apps-email-basic')}}" class="nav-link"> @lang('translation.basic-action') </a>
                                                     </li>
                                                    <li class="nav-item">
                                                        <a href="{{url('admin/apps-email-ecommerce')}}" class="nav-link"> @lang('translation.ecommerce-action') </a>
                                                     </li>
                                                </ul>
                                            </div>
                                         </li>
                                    </ul>
                                </div>
                             </li>
                            <li class="nav-item">
                                <a href="#sidebarEcommerce" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEcommerce">@lang('translation.ecommerce')
                                 </a>
                                <div class="collapse menu-dropdown" id="sidebarEcommerce">
                                    <ul class="nav nav-sm flex-column">
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-ecommerce-products')}}" class="nav-link">@lang('translation.products')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-ecommerce-product-details')}}" class="nav-link">@lang('translation.product-Details')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-ecommerce-add-product')}}" class="nav-link">@lang('translation.create-product')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-ecommerce-orders')}}" class="nav-link">@lang('translation.orders')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-ecommerce-order-details')}}" class="nav-link">@lang('translation.order-details')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-ecommerce-customers')}}" class="nav-link">@lang('translation.customers')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-ecommerce-cart')}}" class="nav-link">@lang('translation.shopping-cart')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-ecommerce-checkout')}}" class="nav-link">@lang('translation.checkout')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-ecommerce-sellers')}}" class="nav-link">@lang('translation.sellers')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-ecommerce-seller-details')}}" class="nav-link">@lang('translation.sellers-details')</a>
                                        </li>
                                     </ul>
                                </div>
                            </li>
                             <li class="nav-item">
                                <a href="#sidebarProjects" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProjects">@lang('translation.projects')
                                </a>
                                 <div class="collapse menu-dropdown" id="sidebarProjects">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                             <a href="{{url('admin/apps-projects-list')}}" class="nav-link">@lang('translation.list')</a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="{{url('admin/apps-projects-overview')}}" class="nav-link">@lang('translation.overview')</a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="{{url('admin/apps-projects-create')}}" class="nav-link">@lang('translation.create-project')</a>
                                        </li>
                                    </ul>
                                 </div>
                            </li>
                            <li class="nav-item">
                                 <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTasks">@lang('translation.tasks')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTasks">
                                     <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-tasks-kanban')}}" class="nav-link">@lang('translation.kanbanboard')</a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-tasks-list-view')}}" class="nav-link">@lang('translation.list-view')</a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-tasks-details')}}" class="nav-link">@lang('translation.task-details')</a>
                                         </li>
                                    </ul>
                                </div>
                             </li>
                            <li class="nav-item">
                                <a href="#sidebarCRM" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCRM">@lang('translation.crm')
                                 </a>
                                <div class="collapse menu-dropdown" id="sidebarCRM">
                                    <ul class="nav nav-sm flex-column">
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-crm-contacts')}}" class="nav-link">@lang('translation.contacts')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-crm-companies')}}" class="nav-link">@lang('translation.companies')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-crm-deals')}}" class="nav-link">@lang('translation.deals')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-crm-leads')}}" class="nav-link">@lang('translation.leads')</a>
                                        </li>
                                     </ul>
                                </div>
                            </li>
                             <li class="nav-item">
                                <a href="#sidebarCrypto" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrypto">@lang('translation.crypto')
                                </a>
                                 <div class="collapse menu-dropdown" id="sidebarCrypto">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                             <a href="{{url('admin/apps-crypto-transactions')}}" class="nav-link">@lang('translation.transactions')</a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="{{url('admin/apps-crypto-buy-sell')}}" class="nav-link">@lang('translation.buy-sell')</a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="{{url('admin/apps-crypto-orders')}}" class="nav-link">@lang('translation.orders')</a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="{{url('admin/apps-crypto-wallet')}}" class="nav-link">@lang('translation.my-wallet')</a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="{{url('admin/apps-crypto-ico')}}" class="nav-link">@lang('translation.ico-list')</a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="{{url('admin/apps-crypto-kyc')}}" class="nav-link">@lang('translation.kyc-application')</a>
                                        </li>
                                    </ul>
                                 </div>
                            </li>
                            <li class="nav-item">
                                 <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoices">@lang('translation.invoices')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarInvoices">
                                     <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-invoices-list')}}" class="nav-link">@lang('translation.list-view')</a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-invoices-details')}}" class="nav-link">@lang('translation.details')</a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-invoices-create')}}" class="nav-link">@lang('translation.create-invoice')</a>
                                         </li>
                                    </ul>
                                </div>
                             </li>
                            <li class="nav-item">
                                <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTickets">@lang('translation.supprt-tickets')
                                 </a>
                                <div class="collapse menu-dropdown" id="sidebarTickets">
                                    <ul class="nav nav-sm flex-column">
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-tickets-list')}}" class="nav-link">@lang('translation.list-view')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/apps-tickets-details')}}" class="nav-link">@lang('translation.ticket-details')</a>
                                        </li>
 
                                    </ul>
                                </div>
                             </li>
                            <li class="nav-item">
                                <a href="#sidebarnft" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarnft" data-key="t-nft-marketplace">
                                     @lang('translation.nft-marketplace')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarnft">
                                     <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-nft-marketplace')}}" class="nav-link"> @lang('translation.marketplace') </a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-nft-explore')}}" class="nav-link"> @lang('translation.explore-now') </a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-nft-auction')}}" class="nav-link"> @lang('translation.live-auction') </a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-nft-item-details')}}" class="nav-link"> @lang('translation.item-details') </a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-nft-collections')}}" class="nav-link"> @lang('translation.collections') </a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-nft-creators')}}" class="nav-link"> @lang('translation.creators') </a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-nft-ranking')}}" class="nav-link"> @lang('translation.ranking') </a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-nft-wallet')}}" class="nav-link"> @lang('translation.wallet-connect') </a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-nft-create')}}" class="nav-link"> @lang('translation.create-nft') </a>
                                         </li>
                                    </ul>
                                </div>
                             </li>
                            <li class="nav-item">
                                <a href="{{url('admin/apps-file-manager')}}" class="nav-link"> <span>@lang('translation.file-manager')</span></a>
                             </li>
                            <li class="nav-item">
                                <a href="{{url('admin/apps-todo')}}" class="nav-link"> <span>@lang('translation.to-do')</span></a>
                             </li>
                            <li class="nav-item">
                                <a href="#sidebarjobs" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarjobs"> <span>@lang('translation.jobs')</span> <span class="badge badge-pill bg-success">@lang('translation.new')</span></a>
                                 <div class="collapse menu-dropdown" id="sidebarjobs">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                             <a href="{{url('admin/apps-job-statistics')}}" class="nav-link"> @lang('translation.statistics') </a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="#sidebarJoblists" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarJoblists">
                                                @lang('translation.job-lists')
                                            </a>
                                             <div class="collapse menu-dropdown" id="sidebarJoblists">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                         <a href="{{url('admin/apps-job-lists')}}" class="nav-link"> @lang('translation.list')
                                                        </a>
                                                    </li>
                                                     <li class="nav-item">
                                                        <a href="{{url('admin/apps-job-grid-lists')}}" class="nav-link"> @lang('translation.grid') </a>
                                                    </li>
                                                     <li class="nav-item">
                                                        <a href="{{url('admin/apps-job-details')}}" class="nav-link"> @lang('translation.overview')</a>
                                                    </li>
                                                 </ul>
                                            </div>
                                        </li>
                                         <li class="nav-item">
                                            <a href="#sidebarCandidatelists" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCandidatelists">
                                                @lang('translation.candidate-lists')
                                             </a>
                                            <div class="collapse menu-dropdown" id="sidebarCandidatelists">
                                                <ul class="nav nav-sm flex-column">
                                                     <li class="nav-item">
                                                        <a href="{{url('admin/apps-job-candidate-lists')}}" class="nav-link"> @lang('translation.list-view')
                                                        </a>
                                                     </li>
                                                    <li class="nav-item">
                                                        <a href="{{url('admin/apps-job-candidate-grid')}}" class="nav-link"> @lang('translation.grid-view')</a>
                                                     </li>
                                                </ul>
                                            </div>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-job-application')}}" class="nav-link"> @lang('translation.application') </a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-job-new')}}" class="nav-link"> @lang('translation.new-job') </a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-job-companies-lists')}}" class="nav-link"> @lang('translation.companies-list') </a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/apps-job-categories')}}" class="nav-link"> @lang('translation.job-categories')</a>
                                         </li>
                                    </ul>
                                </div>
                             </li>
                            <li class="nav-item">
                                <a href="{{url('admin/apps-api-key')}}" class="nav-link"> <span> @lang('translation.api-key')</span> <span class="badge badge-pill bg-success"> @lang('translation.new')</span></a>
                             </li>
                        </ul>
                    </div>
                 </li>

                <li class="nav-item">
                     <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i data-feather="layout" class="icon-dual"></i> <span>@lang('translation.layouts')</span><span class="badge badge-pill bg-danger" data-key="t-hot">@lang('translation.hot')</span>
                    </a>
                     <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                 <a href="{{url('admin/layouts-horizontal')}}" target="_blank" class="nav-link">@lang('translation.horizontal')</a>
                            </li>
                            <li class="nav-item">
                                 <a href="{{url('admin/layouts-detached')}}" target="_blank" class="nav-link">@lang('translation.detached')</a>
                            </li>
                            <li class="nav-item">
                                 <a href="{{url('admin/layouts-two-column')}}" target="_blank" class="nav-link">@lang('translation.two-column')</a>
                            </li>
                            <li class="nav-item">
                                 <a href="{{url('admin/layouts-vertical-hovered')}}" target="_blank" class="nav-link">@lang('translation.hovered')</a>
                            </li>
                        </ul>
                     </div>
                </li> <!-- end Dashboard Menu -->

                 <li class="menu-title"><i class="ri-more-fill"></i> <span>@lang('translation.pages')</span></li>

                <li class="nav-item">
                     <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i data-feather="users" class="icon-dual"></i> <span>@lang('translation.authentication')</span>
                    </a>
                     <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                 <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn">@lang('translation.signin')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignIn">
                                     <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{url('admin/auth-signin-basic')}}" class="nav-link">@lang('translation.basic')</a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/auth-signin-cover')}}" class="nav-link">@lang('translation.cover')</a>
                                         </li>
                                    </ul>
                                </div>
                             </li>
                            <li class="nav-item">
                                <a href="#sidebarSignUp" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignUp">@lang('translation.signup')
                                 </a>
                                <div class="collapse menu-dropdown" id="sidebarSignUp">
                                    <ul class="nav nav-sm flex-column">
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-signup-basic')}}" class="nav-link">@lang('translation.basic')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-signup-cover')}}" class="nav-link">@lang('translation.cover')</a>
                                        </li>
                                     </ul>
                                </div>
                            </li>
 
                            <li class="nav-item">
                                <a href="#sidebarResetPass" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarResetPass">@lang('translation.password-reset')
                                 </a>
                                <div class="collapse menu-dropdown" id="sidebarResetPass">
                                    <ul class="nav nav-sm flex-column">
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-pass-reset-basic')}}" class="nav-link">@lang('translation.basic')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-pass-reset-cover')}}" class="nav-link">@lang('translation.cover')</a>
                                        </li>
                                     </ul>
                                </div>
                            </li>
 
                            <li class="nav-item">
                                <a href="#sidebarchangePass" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarchangePass">@lang('translation.password-create')
                                 </a>
                                <div class="collapse menu-dropdown" id="sidebarchangePass">
                                    <ul class="nav nav-sm flex-column">
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-pass-change-basic')}}" class="nav-link">@lang('translation.basic')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-pass-change-cover')}}" class="nav-link">@lang('translation.cover')</a>
                                        </li>
                                     </ul>
                                </div>
                            </li>
 
                            <li class="nav-item">
                                <a href="#sidebarLockScreen" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLockScreen">@lang('translation.lock-screen')
                                 </a>
                                <div class="collapse menu-dropdown" id="sidebarLockScreen">
                                    <ul class="nav nav-sm flex-column">
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-lockscreen-basic')}}" class="nav-link">@lang('translation.basic')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-lockscreen-cover')}}" class="nav-link">@lang('translation.cover')</a>
                                        </li>
                                     </ul>
                                </div>
                            </li>
 
                            <li class="nav-item">
                                <a href="#sidebarLogout" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLogout">@lang('translation.logout')
                                 </a>
                                <div class="collapse menu-dropdown" id="sidebarLogout">
                                    <ul class="nav nav-sm flex-column">
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-logout-basic')}}" class="nav-link">@lang('translation.basic')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-logout-cover')}}" class="nav-link">@lang('translation.cover')</a>
                                        </li>
                                     </ul>
                                </div>
                            </li>
                             <li class="nav-item">
                                <a href="#sidebarSuccessMsg" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSuccessMsg">@lang('translation.success-message')
                                </a>
                                 <div class="collapse menu-dropdown" id="sidebarSuccessMsg">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                             <a href="{{url('admin/auth-success-msg-basic')}}" class="nav-link">@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="{{url('admin/auth-success-msg-cover')}}" class="nav-link">@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                 </div>
                            </li>
                            <li class="nav-item">
                                 <a href="#sidebarTwoStep" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTwoStep">@lang('translation.two-step-verification')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTwoStep">
                                     <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{url('admin/auth-twostep-basic')}}" class="nav-link">@lang('translation.basic')</a>
                                         </li>
                                        <li class="nav-item">
                                            <a href="{{url('admin/auth-twostep-cover')}}" class="nav-link">@lang('translation.cover')</a>
                                         </li>
                                    </ul>
                                </div>
                             </li>
                            <li class="nav-item">
                                <a href="#sidebarErrors" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarErrors">@lang('translation.errors')
                                 </a>
                                <div class="collapse menu-dropdown" id="sidebarErrors">
                                    <ul class="nav nav-sm flex-column">
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-404-basic')}}" class="nav-link">@lang('translation.404-basic')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-404-cover')}}" class="nav-link">@lang('translation.404-cover')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-404-alt')}}" class="nav-link">@lang('translation.404-alt')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-500')}}" class="nav-link">@lang('translation.500')</a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="{{url('admin/auth-offline')}}" class="nav-link">@lang('translation.offline-page')</a>
                                        </li>
                                     </ul>
                                </div>
                            </li>
                         </ul>
                    </div>
                </li>
 
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i data-feat
her="command" class="icon-dual"></i> <span>@lang('translation.pages')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul cla
ss="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('admin/pages-starter')}}" class="nav-link">@lang('translation.starter')</a>
                            </l
i>
                            <li class="nav-item">
                                <a href="#sidebarProfile" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">@lang('translation.profile')
                                </a
>
                                <div class="collapse menu-dropdown" id="sidebarProfile">
                                    <ul class="nav nav-sm flex-column">
                               
         <li class="nav-item">
                                            <a href="{{url('admin/pages-profile')}}" class="nav-link">@lang('translation.simple-page')</a>
                                        </li>
                                
        <li class="nav-item">
                                            <a href="{{url('admin/pages-profile-settings')}}" class="nav-link">@lang('translation.settings')</a>
                                        </li>
                                  
  </ul>
                                </div>
                            </li>
                            <li class="nav
-item">
                                <a href="{{url('admin/pages-team')}}" class="nav-link">@lang('translation.team')</a>
                            </li>
                            <li class="
nav-item">
                                <a href="{{url('admin/pages-timeline')}}" class="nav-link">@lang('translation.timeline')</a>
                            </li>
                            <li class="nav-
item">
                                <a href="{{url('admin/pages-faqs')}}" class="nav-link">@lang('translation.faqs')</a>
                            </li>
                            <li clas
s="nav-item">
                                <a href="{{url('admin/pages-pricing')}}" class="nav-link">@lang('translation.pricing')</a>
                            </li>
                            <li cla
ss="nav-item">
                                <a href="{{url('admin/pages-gallery')}}" class="nav-link">@lang('translation.gallery')</a>
                            </li>
                            <li class="nav
-item">
                                <a href="{{url('admin/pages-maintenance')}}" class="nav-link">@lang('translation.maintenance')</a>
                            </li>
                            <li class="na
v-item">
                                <a href="{{url('admin/pages-coming-soon')}}" class="nav-link">@lang('translation.coming-soon')</a>
                            </li>
                            <li c
lass="nav-item">
                                <a href="{{url('admin/pages-sitemap')}}" class="nav-link">@lang('translation.sitemap')</a>
                            </li>
                            <li class="n
av-item">
                                <a href="{{url('admin/pages-search-results')}}" class="nav-link">@lang('translation.search-results')</a>
                            </li>
                            <li clas
s="nav-item">
                                <a href="{{url('admin/pages-privacy-policy')}}" class="nav-link"><span>@lang('translation.privacy-policy')</span> <span class="badge badge-pill bg-success">@lang('translation.new')</span></a>
                            </li>
                            <li class="n
av-item">
                                <a href="{{url('admin/pages-term-conditions')}}" class="nav-link"><span data-key="t-term-conditions">Term & Conditions</span> <span class="badge badge-pill bg-success">@lang('translation.new')</span></a>
                            </li>
                        </ul>

                    </div>
                </li>
                <li class="nav-ite
m">
                    <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-rocket-line"></i> <span>@lang('translation.landing')</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <li cla
ss="nav-item">
                                <a href="{{url('admin/landing')}}" class="nav-link"> @lang('translation.one-page') </a>
                            </li>
                            <li
 class="nav-item">
                                <a href="{{url('admin/nft-landing')}}" class="nav-link"> @lang('translation.nft-landing')</a>
                            </li>
                            <li cla
ss="nav-item">
                                <a href="{{url('admin/job-landing')}}" class="nav-link"><span>@lang('translation.job')</span> <span class="badge badge-pill bg-success">@lang('translation.new')</span></a>
                            </li>
                        </ul>

                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span>@lang('translation.components')</span></li>

                <li class="nav-item">

                    <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                        <i data-feather="package" class="icon-dual"></i> <span>@lang('translation.base-ui')</span>
                    </a>

                    <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                        <div class="row">
                            <div class=
"col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                              
          <a href="{{url('admin/ui-alerts')}}" class="nav-link">@lang('translation.alerts')</a>
                                    </li>
                                    <li class="nav-item">
                                   
     <a href="{{url('admin/ui-badges')}}" class="nav-link">@lang('translation.badges')</a>
                                    </li>
                                    <li class="nav-item">
                                    
    <a href="{{url('admin/ui-buttons')}}" class="nav-link">@lang('translation.buttons')</a>
                                    </li>
                                    <li class="nav-item">
                                
        <a href="{{url('admin/ui-colors')}}" class="nav-link">@lang('translation.colors')</a>
                                    </li>
                                    <li class="nav-item">
                                
        <a href="{{url('admin/ui-cards')}}" class="nav-link">@lang('translation.cards')</a>
                                    </li>
                                    <li class="nav-item">
                                 
       <a href="{{url('admin/ui-carousel')}}" class="nav-link">@lang('translation.carousel')</a>
                                    </li>
                                    <li class="nav-item">
                                       
 <a href="{{url('admin/ui-dropdowns')}}" class="nav-link">@lang('translation.dropdowns')</a>
                                    </li>
                                    <li class="nav-item">
                                   
     <a href="{{url('admin/ui-grid')}}" class="nav-link">@lang('translation.grid')</a>
                                    </li>
                                </ul>
                            </div
>
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    
<li class="nav-item">
                                        <a href="{{url('admin/ui-images')}}" class="nav-link">@lang('translation.images')</a>
                                    </li>
                                   
 <li class="nav-item">
                                        <a href="{{url('admin/ui-tabs')}}" class="nav-link">@lang('translation.tabs')</a>
                                    </li>
                                    <li cl
ass="nav-item">
                                        <a href="{{url('admin/ui-accordions')}}" class="nav-link">@lang('translation.accordion-collapse')</a>
                                    </li>
                                   
 <li class="nav-item">
                                        <a href="{{url('admin/ui-modals')}}" class="nav-link">@lang('translation.modals')</a>
                                    </li>
                                    
<li class="nav-item">
                                        <a href="{{url('admin/ui-offcanvas')}}" class="nav-link">@lang('translation.offcanvas')</a>
                                    </li>
                                  
  <li class="nav-item">
                                        <a href="{{url('admin/ui-placeholders')}}" class="nav-link">@lang('translation.placeholders')</a>
                                    </li>
                                    <li c
lass="nav-item">
                                        <a href="{{url('admin/ui-progress')}}" class="nav-link">@lang('translation.progress')</a>
                                    </li>
                                    <li c
lass="nav-item">
                                        <a href="{{url('admin/ui-notifications')}}" class="nav-link">@lang('translation.notifications')</a>
                                    </li>
                                </ul
>
                            </div>
                            <div class="col-lg-4">
                                <ul class
="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{url('admin/ui-media')}}" class="nav-link">@lang('translation.media-object')</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{url('admin/ui-embed-video')}}" class="nav-link">@lang('translation.embed-video')</a>
                                    </
li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/ui-typography')}}" class="nav-link">@lang('translation.typography')</a>
                                    </
li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/ui-lists')}}" class="nav-link">@lang('translation.lists')</a>
                                    </l
i>
                                    <li class="nav-item">
                                        <a href="{{url('admin/ui-general')}}" class="nav-link">@lang('translation.general')</a>
                                    </l
i>
                                    <li class="nav-item">
                                        <a href="{{url('admin/ui-ribbons')}}" class="nav-link">@lang('translation.ribbons')</a>
                                    </
li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/ui-utilities')}}" class="nav-link">@lang('translation.utilities')</a>
                                   
 </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                        <i data-feath
er="layers" class="icon-dual"></i> <span>@lang('translation.advance-ui')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                        <ul class="nav 
nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('admin/advance-ui-sweetalerts')}}" class="nav-link">@lang('translation.sweet-alerts')</a>
                            </li
>
                            <li class="nav-item">
                                <a href="{{url('admin/advance-ui-nestable')}}" class="nav-link">@lang('translation.nestable-list')</a>
                            </l
i>
                            <li class="nav-item">
                                <a href="{{url('admin/advance-ui-scrollbar')}}" class="nav-link">@lang('translation.scrollbar')</a>
                            </
li>
                            <li class="nav-item">
                                <a href="{{url('admin/advance-ui-animation')}}" class="nav-link">@lang('translation.animation')</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/advance-ui-tour')}}" class="nav-link">@lang('translation.tour')</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/advance-ui-swiper')}}" class="nav-link">@lang('translation.swiper-slider')</a>
                            </l
i>
                            <li class="nav-item">
                                <a href="{{url('admin/advance-ui-ratings')}}" class="nav-link">@lang('translation.ratings')</a>
                            </l
i>
                            <li class="nav-item">
                                <a href="{{url('admin/advance-ui-highlight')}}" class="nav-link">@lang('translation.highlight')</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/advance-ui-scrollspy')}}" class="nav-link">@lang('translation.scrollSpy')</a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-li
nk menu-link" href="{{url('admin/widgets')}}">
                        <i data-feather="copy" class="icon-dual"></i> <span>@lang('translation.widgets')</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-
link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
                        <i data-feather="file-text" class="icon-dual"></i> <span>@lang('translation.forms')</span>
                    </a>
                    <div class="collapse 
menu-dropdown" id="sidebarForms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="
{{url('admin/forms-elements')}}" class="nav-link">@lang('translation.basic-elements')</a>
                            </li>
                            <li class="nav-item">
                                <a
 href="{{url('admin/forms-select')}}" class="nav-link">@lang('translation.form-select')</a>
                            </li>
                            <li class="nav-item">
                              
  <a href="{{url('admin/forms-checkboxs-radios')}}" class="nav-link">@lang('translation.checkboxs-radios')</a>
                            </li>
                            <li class="nav-item">
                                <a
 href="{{url('admin/forms-pickers')}}" class="nav-link">@lang('translation.pickers')</a>
                            </li>
                            <li class="nav-item">
                              
  <a href="{{url('admin/forms-masks')}}" class="nav-link">@lang('translation.input-masks')</a>
                            </li>
                            <li class="nav-item">
                                <a hr
ef="{{url('admin/forms-advanced')}}" class="nav-link">@lang('translation.advanced')</a>
                            </li>
                            <li class="nav-item">
                                <a 
href="{{url('admin/forms-range-sliders')}}" class="nav-link">@lang('translation.range-slider')</a>
                            </li>
                            <li class="nav-item">
                                <a hr
ef="{{url('admin/forms-validation')}}" class="nav-link">@lang('translation.validation')</a>
                            </li>
                            <li class="nav-item">
                                <a
 href="{{url('admin/forms-wizard')}}" class="nav-link">@lang('translation.wizard')</a>
                            </li>
                            <li class="nav-item">
                                
<a href="{{url('admin/forms-editors')}}" class="nav-link">@lang('translation.editors')</a>
                            </li>
                            <li class="nav-item">
                                <a href="
{{url('admin/forms-file-uploads')}}" class="nav-link">@lang('translation.file-uploads')</a>
                            </li>
                            <li class="nav-item">
                                <
a href="{{url('admin/forms-layouts')}}" class="nav-link">@lang('translation.form-layouts')</a>
                            </li>
                            <li class="nav-item">
                                
<a href="{{url('admin/forms-select2')}}" class="nav-link">@lang('translation.select2')</a>
                            </li>
                        </ul>
                    </div>

                </li>

                <li class="nav-it
em">
                    <a class="nav-link menu-link" href="#sidebarTables" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTables">
                        <i data-feather="database" class="icon-dual"></i> <span>@lang('translation.tables')</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarTables">
                        <ul class="nav nav-sm flex-column">
                            <li 
class="nav-item">
                                <a href="{{url('admin/tables-basic')}}" class="nav-link">@lang('translation.basic-tables')</a>
                            </li>
                            <li class="na
v-item">
                                <a href="{{url('admin/tables-gridjs')}}" class="nav-link">@lang('translation.grid-js')</a>
                            </li>
                            <li 
class="nav-item">
                                <a href="{{url('admin/tables-listjs')}}" class="nav-link">@lang('translation.list-js')</a>
                            </li>
                            <li 
class="nav-item">
                                <a href="{{url('admin/tables-datatables')}}" class="nav-link">@lang('translation.datatables') </a>
                            </li>
                        </ul>

                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCharts">
                        <i data-
feather="pie-chart" class="icon-dual"></i> <span>@lang('translation.charts')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCharts">
                        <ul class="nav
 nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarApexcharts" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApexcharts">@lang('translation.apexcharts')
                                
</a>
                                <div class="collapse menu-dropdown" id="sidebarApexcharts">
                                    <ul class="nav nav-sm flex-column">
                                
        <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-line')}}" class="nav-link">@lang('translation.line')</a>
                                        </li>
                                 
       <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-area')}}" class="nav-link">@lang('translation.area')</a>
                                        </li>
                                
        <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-column')}}" class="nav-link">@lang('translation.column')</a>
                                        </li>
                                
        <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-bar')}}" class="nav-link">@lang('translation.bar')</a>
                                        </li>
                                        <l
i class="nav-item">
                                            <a href="{{url('admin/charts-apex-mixed')}}" class="nav-link">@lang('translation.mixed')</a>
                                        </li>
                                
        <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-timeline')}}" class="nav-link">@lang('translation.timeline')</a>
                                        </li>
                                
        <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-candlestick')}}" class="nav-link">@lang('translation.candlstick')</a>
                                        </li>
                                        <li clas
s="nav-item">
                                            <a href="{{url('admin/charts-apex-boxplot')}}" class="nav-link">@lang('translation.boxplot')</a>
                                        </li>
                                
        <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-bubble')}}" class="nav-link">@lang('translation.bubble')</a>
                                        </li>
                                
        <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-scatter')}}" class="nav-link">@lang('translation.scatter')</a>
                                        </li>
                                 
       <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-heatmap')}}" class="nav-link">@lang('translation.heatmap')</a>
                                        </li>
                                    
    <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-treemap')}}" class="nav-link">@lang('translation.treemap')</a>
                                        </li>
                                    
    <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-pie')}}" class="nav-link">@lang('translation.pie')</a>
                                        </li>
                                  
      <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-radialbar')}}" class="nav-link">@lang('translation.radialbar')</a>
                                        </li>
                              
          <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-radar')}}" class="nav-link">@lang('translation.radar')</a>
                                        </li>
                                       
 <li class="nav-item">
                                            <a href="{{url('admin/charts-apex-polar')}}" class="nav-link">@lang('translation.polar-area')</a>
                                        </li>
                                
    </ul>
                                </div>
                            </li>
                            <li cl
ass="nav-item">
                                <a href="{{url('admin/charts-chartjs')}}" class="nav-link">@lang('translation.chartjs')</a>
                            </li>
                            <li cl
ass="nav-item">
                                <a href="{{url('admin/charts-echarts')}}" class="nav-link">@lang('translation.echarts')</a>
                            </li>
                        </ul>

                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                        <i data
-feather="archive" class="icon-dual"></i> <span>@lang('translation.icons')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarIcons">
                        <ul class="
nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('admin/icons-remix')}}" class="nav-link">@lang('translation.remix')</a>
                            </l
i>
                            <li class="nav-item">
                                <a href="{{url('admin/icons-boxicons')}}" class="nav-link">@lang('translation.boxicons')</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/icons-materialdesign')}}" class="nav-link">@lang('translation.material-design')</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/icons-lineawesome')}}" class="nav-link">@lang('translation.line-awesome')</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/icons-feather')}}" class="nav-link">@lang('translation.feather')</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/icons-crypto')}}" class="nav-link"> <span>@lang('translation.crypto-svg')</span></a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link me
nu-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMaps">
                        <i data-feather="map-pin" class="icon-dual"></i> <span>@lang('translation.maps')</span>
                    </a>
                    <div class
="collapse menu-dropdown" id="sidebarMaps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                              
  <a href="{{url('admin/maps-google')}}" class="nav-link">
                                    @lang('translation.google')
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/maps-vector')}}" class="nav-link">
                                   
 @lang('translation.vector')
                                </a>
                            </li>
                            <li class=
"nav-item">
                                <a href="{{url('admin/maps-leaflet')}}" class="nav-link">
                                    @lang('translation.leaflet')
                              
  </a>
                            </li>
                        </ul>
                    </div>

                </li>

                <li class="nav-item">

                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i data-feather="share-2" class="icon-dual"></i> <span>@lang('translation.multi-level')</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li c
lass="nav-item">
                                <a href="#" class="nav-link">@lang('translation.level-1.1')</a>
                            </li>
                            <li c
lass="nav-item">
                                <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount">@lang('translation.level-1.2')
                                </a>
                                <d
iv class="collapse menu-dropdown" id="sidebarAccount">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                 
           <a href="#" class="nav-link">@lang('translation.level-2.1')</a>
                                        </li>
                                        <li class="nav-item">
                                
            <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm">@lang('translation.level-2.2')
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCrm">
                                   
             <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link">@lang('translation.level-3.1')</a>
                                    
                </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link">@lang('translation.level-3.2')</a>
                               
                     </li>
                                                </ul>
                                            </div>
                                 
       </li>
                                    </ul>
                                </div>
                            </l
i>
                        </ul>
                    </div>
                </li>


            </ul>
        </div>

        <!-- Sidebar -->
    </div>
    <div class="sidebar-background">
</div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->

<div class="vertical-overlay"></div>
