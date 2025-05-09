@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{trans('admin/main.affiliate_users')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{trans('admin/main.affiliate_users')}}</div>
            </div>
        </div>

        <div class="section-body">


            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @can('admin_referrals_export')
                                <div class="text-right">
                                    <a href="{{ getAdminPanelUrl() }}/referrals/excel?type=users" class="btn btn-primary">{{ trans('admin/main.export_xls') }}</a>
                                </div>
                            @endcan
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 ">
                                    <tr>
                                        <th>{{ trans('admin/main.user') }}</th>
                                        <th>{{ trans('admin/main.role') }}</th>
                                        <th>{{ trans('admin/main.user_group') }}</th>
                                        <th>{{ trans('admin/main.referral_code') }}</th>
                                        <th>{{ trans('admin/main.registration_income') }}</th>
                                        <th>{{ trans('admin/main.aff_sales_commission') }}</th>
                                        <th>{{ trans('admin/main.status') }}</th>
                                        <th>{{ trans('admin/main.actions') }}</th>
                                    </tr>

                                    <tbody>
                                    @foreach($affiliates as $affiliate)
                                        <tr>
                                            <td>
                                                @if(!empty($affiliate->affiliateUser))
                                                    {{ $affiliate->affiliateUser->full_name }}
                                                @else
                                                    {{ trans('update.deleted_user') }}
                                                @endif
                                            </td>

                                            <td>
                                                @if(!empty($affiliate->affiliateUser))
                                                    @if($affiliate->affiliateUser->isUser())
                                                        {{ trans('quiz.student') }}
                                                    @elseif($affiliate->affiliateUser->isTeacher())
                                                        {{ trans('panel.teacher') }}
                                                    @elseif($affiliate->affiliateUser->isOrganization())
                                                        {{ trans('home.organization') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <td>
                                                @if(!empty($affiliate->affiliateUser))
                                                    {{  !empty($affiliate->affiliateUser->getUserGroup()) ? $affiliate->affiliateUser->getUserGroup()->name : '-'  }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <td>
                                                @if(!empty($affiliate->affiliateUser))
                                                    {{ !empty($affiliate->affiliateUser->affiliateCode) ? $affiliate->affiliateUser->affiliateCode->code : '' }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <td>
                                                {{ handlePrice($affiliate->getTotalAffiliateRegistrationAmounts()) }}
                                            </td>

                                            <td>
                                                {{ handlePrice($affiliate->getTotalAffiliateCommissions()) }}
                                            </td>

                                            <td>
                                                @if(!empty($affiliate->affiliateUser))
                                                    {{ $affiliate->affiliateUser->affiliate ? trans('admin/main.yes') : trans('admin/main.no') }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <td>
                                                @if(!empty($affiliate->affiliateUser))
                                                    <a href="{{ getAdminPanelUrl() }}/users/{{ $affiliate->affiliateUser->id }}/edit" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.edit') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            {{--{{ $affiliates->appends(request()->input())->links() }}--}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="card">
        <div class="card-body">
            <div class="section-title ml-0 mt-0 mb-3"><h5>{{trans('admin/main.hints')}}</h5></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold">{{trans('admin/main.registration_income_hint')}}</div>
                        <div class=" text-small font-600-bold">{{trans('admin/main.registration_income_desc')}}</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold">{{trans('admin/main.aff_sales_commission_hint')}}</div>
                        <div class=" text-small font-600-bold">{{trans('admin/main.aff_sales_commission_desc')}}</div>
                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection

@push('scripts_bottom')

@endpush
