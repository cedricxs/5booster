@extends('layout.client')
@section('content')
    <div id="invoice">
    <link rel="stylesheet" href="https://b.stripecdn.com/manage/assets/app.manage-923edbe92fb37e72c104f2c41c6dc27d.css">
    <link rel="stylesheet" href="https://b.stripecdn.com/manage/assets/app.manage.new_css-e22b30c87ca70d28bab51318259003df.css">
    <link rel="stylesheet" href="https://b.stripecdn.com/manage/assets/sail-98ae7ac304cbaeae80897060c7c93a43.css">
    <div class="Card-root Card--radius--all Card--shadow--medium Section Box-root Box-background--white">
        <div class="ContentHeader Box-root Box-background--white Box-divider--light-bottom-1 Padding-horizontal--20 Padding-vertical--16 Flex-flex Flex-direction--column">
            <div class="Box-root Flex-flex Flex-direction--row Flex-justifyContent--spaceBetween">
                <div class="Box-root Flex-flex Flex-direction--column Flex-justifyContent--center" style="flex: 1 1 auto;">
                    <span class="ContentHeader-title Text-color--dark Text-fontSize--20 Text-fontWeight--regular Text-lineHeight--28 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">
                        <span class="Text-color--dark Text-align--center Text-fontSize--20 Text-fontWeight--regular Text-lineHeight--28 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--block">
                            <div class="Box-root Margin-top--16 Margin-bottom--4">

                            </div>
                        </span>
                    </span>
                </div>
            </div>
        </div><div class="ContentBlock db-InvoiceAction-container Box-root Box-background--white Box-divider--light-bottom-1">
            <div class="FormLayout Box-root Box-background--offset Box-divider--light-bottom-1">
                <div class="Box-root">
                    <div class="Box-root" style="position: relative;">
                        <div class="Box-root Padding-all--32">
                            <div class="Box-root" style="pointer-events: none;">
                                <div class="Box-root Flex-flex Flex-direction--column Flex-justifyContent--flexStart Flex-wrap--nowrap" style="margin-left: -16px; margin-top: -16px;">
                                    <div class="Box-root Box-hideIfEmpty Margin-top--16 Margin-left--16" style="pointer-events: auto;"><div class="Box-root" style="width: 100%; text-align: center;">
                                            <div class="Box-root Margin-bottom--16 Flex-flex Flex-justifyContent--center">
                                                <div aria-hidden="true" class="SVGInline SVGInline--cleaned SVG Icon Icon--checkCircle Icon-color Icon-color--green Box-root Flex-flex">
                                                    <svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--checkCircle-svg Icon-color-svg Icon-color--green-svg" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg" style="height: 32px; width: 32px;"><path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm3.083-11.005L7 9.085 5.207 7.294a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4.79-4.798a1 1 0 1 0-1.414-1.414z" fill-rule="evenodd"></path></svg>
                                                </div>
                                            </div>
                                            <span class="Text-color--green Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--inline">
                                                <span>Facture payée</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="Box-root Box-hideIfEmpty Margin-top--16 Margin-left--16" style="pointer-events: auto;">
                                        <span class="Text-color--dark Text-align--center Text-fontSize--20 Text-fontWeight--regular Text-lineHeight--28 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--block">
                                            <span> Payée <span>€{{sprintf("%.2f",$inv->amount_paid/100)}}</span></span></span></div><div class="Box-root Box-hideIfEmpty Margin-top--16 Margin-left--16" style="pointer-events: auto;">
                                        <div class="Box-root Flex-flex Flex-justifyContent--center"><div class="Box-root Flex-flex">
                                                <div class="Box-root Flex-flex"><div class="PressableCore PressableCore--cursor--pointer PressableCore--height--medium PressableCore--radius--all PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Box-root Flex-inlineFlex" style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.12) 0px 2px 5px 0px;"><div class="PressableCore-base Box-root">
                                                            <button  aria-controls="menu1" aria-haspopup="menu" id="menu1-button" class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--20 PressableContext--fontSize--14 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--medium PressableContext--radius--all PressableContext--width PressableContext--width--auto" type="button" style="color: rgb(60, 66, 87);">
                                                                <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row" style="position: relative;"><div class="TextAligner Box-root" style="line-height: 20px; font-size: 14px; flex: 0 0 auto;"></div><div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center" style="width: 100%; line-height: 0; flex: 1 1 auto;">
                                                                        <div class="Box-root Padding-right--8">
                                                                            <div aria-hidden="true" class="SVGInline SVGInline--cleaned SVG Icon Icon--arrowDown Button-icon Icon-color Icon-color--gray600 Box-root Flex-flex" style="transform: translateY(1.1px);">
                                                                                <svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--arrowDown-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg" style="height: 12px; width: 12px;"><path d="M9 12.583l4.591-4.591a1 1 0 0 1 1.416 1.415l-6.3 6.3a1 1 0 0 1-1.414 0l-6.3-6.3A1 1 0 0 1 2.41 7.992L7 12.583V1a1 1 0 1 1 2 0z" fill-rule="evenodd"></path></svg>
                                                                            </div>
                                                                        </div>
                                                                        <span class="Button-label Text-color--default Text-fontSize--14 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--noWrap Text-display--block" style="margin-top: -1px;">
                                                                            <a href="{{url('client/invoice').'/'.$inv->id}}"><span>Download PDF</span></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <div class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white"></div>
                                                    </div></div></div>
                                            <iframe name="receipt_downloader" width="0" height="0" style="display: none;"></iframe>
                                            <iframe name="invoice_downloader" width="0" height="0" style="display: none;"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Box-root Box-divider--light-top-1">
        <div class="ContentBlock Box-root Box-background--white Box-divider--light-bottom-1">
            <div class="Box-root Padding-all--32"><div role="grid" tabindex="0" class="db-DataGrid-root Box-root Box-background--white"><div role="row" class="db-DataGrid-row Box-root Box-divider--light-bottom-1 Padding-bottom--16" style="grid-template-columns: 7fr 1fr 2fr 2fr;">
                        <div role="gridcell" class="Box-root"><span class="Text-color--dark Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--inline">
                                <span>Description</span></span>
                        </div>
                        <div role="gridcell" class="Box-root Flex-flex Flex-alignItems--flexStart Flex-justifyContent--flexEnd">
                            <span class="Text-color--dark Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--inline">
                                <span>Quantity</span>
                            </span>
                        </div>
                        <div role="gridcell" class="Box-root Flex-flex Flex-alignItems--flexStart Flex-justifyContent--flexEnd">
                            <span class="Text-color--dark Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--inline">
                                <span>Prix</span>
                            </span>
                        </div>
                        <div role="gridcell" class="Box-root Flex-flex Flex-alignItems--flexStart Flex-justifyContent--flexEnd">
                            <span class="Text-color--dark Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--inline">
                                <span>Total</span>
                            </span>
                        </div>
                    </div>
                    <div class="Box-root Box-divider--light-bottom-1">
                        <div role="row" class="db-DataGrid-row Box-root Padding-top--16 Padding-bottom--12" style="grid-template-columns: 7fr 1fr 2fr 2fr;">
                            <div role="gridcell" class="Box-root">
                                <span class="Text-color--gray Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--inline">
                                    <span>

                                    </span>
                                </span>
                            </div>
                            <div data-test="quantity-placeholder" role="gridcell" class="Box-root"></div>
                            <div data-test="unit-amount-placeholder" role="gridcell" class="Box-root"></div>
                            <div data-test="amount-placeholder" role="gridcell" class="Box-root"></div>
                        </div>
                        @foreach($inv->lines['data'] as $item)
                        <div role="row" class="db-DataGrid-row Box-root Padding-vertical--12" style="grid-template-columns: 7fr 1fr 2fr 2fr;">
                            <div role="gridcell" class="Box-root">
                                <span class="Text-color--default Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wordBreak--word Text-wrap--wrap Text-display--inline">{{$item['description']}}</span></div>
                            <div role="gridcell" class="Box-root Flex-flex Flex-alignItems--flexStart Flex-justifyContent--flexEnd">
                                <span>{{$item['quantity']}}</span>
                            </div>
                            <div role="gridcell" class="Box-root Flex-flex Flex-alignItems--flexStart Flex-justifyContent--flexEnd">€0.00</div>
                            <div role="gridcell" class="Box-root Flex-flex Flex-alignItems--flexStart Flex-justifyContent--flexEnd">
                                <span>€{{sprintf("%.2f",$item['amount']/100)}}</span>
                            </div>
                        </div>
                            @endforeach
                    </div>
                    <div role="row" class="db-DataGrid-row Box-root" style="grid-template-columns: 1fr 5fr;">
                        <div role="gridcell" class="Box-root Padding-top--16"></div>
                        <div role="gridcell" class="Box-root Padding-top--4">
                            <div role="row" class="db-DataGrid-row Box-root Padding-top--16" style="grid-template-columns: 4fr 1fr;">
                                <div role="gridcell" class="Box-root Flex-flex Flex-alignItems--center Flex-justifyContent--flexEnd"><span>Total</span></div>
                                <div role="gridcell" class="Box-root Flex-flex Flex-alignItems--center Flex-justifyContent--flexEnd">
                                    <span class="Text-color--default Text-fontSize--14 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">
                                        <span>€{{sprintf("%.2f",$inv->amount_paid/100)}}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

