@extends('layouts.app')

@section('content')
<section>
        <div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>Заявка  {{ $claim->invent_num }}</h2>
                    <h3>
                        РЭС: {{ substr($claim->res, 3, 4)  }}
                    </h3>
                </div>
                <div>
                    @if ($claim->is_deleted == false && auth()->user()->role == 'user')
                    <a class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                    </svg></a>
                    @endif
                </div>

            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="my-3 border-bottom ">
                        <h6>Инвентарный номер: </h6>
                        <p class="fw-normal mx-2">{{ $claim->invent_num }}</p>
                        {{ $claim->res }}
                    </div>
                </div>
                @if ($claim->is_deleted)
                <div class="col-12 col-md-6">
                    <div class="my-3 border-bottom ">
                        <h6>Удален в: </h6>
                        <p class="fw-normal mx-2">{{ date('Y-m-d', strtotime($claim->deleted_at))   }}</p>
                        {{ $claim->res }}
                    </div>
                </div>
                @endif

            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="my-3 border-bottom">
                        <h6>Административный район: </h6>
                        <p class="fw-normal mx-2">{{ $claim->neighborhood }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="my-3 border-bottom">
                        <h6>Адрес: </h6>
                        <p class="fw-normal mx-2">{{ $claim->address }}</p>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="my-3 border-bottom">
                        <h6>Дата разрытия: </h6>
                        <p class="fw-normal mx-2">{{ $claim->date_of_excavation }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="my-3 border-bottom">
                        <h6>Дата восстановления АБП: </h6>
                        <p class="fw-normal mx-2">{{ $claim->date_recovery_ABP }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="my-3 border-bottom">
                        <h6>Площадь вскрытия АБП, м2: </h6>
                        <p class="fw-normal mx-2">{{ $claim->open_square }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="my-3 border-bottom">
                        <h6>Фактически восстановленная площадь м2: </h6>
                        <p class="fw-normal mx-2">{{ $claim->square_restored_area }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">

                    <div class="my-3 border-bottom">
                        <h6>Тип улицы: </h6>
                        <p class="fw-normal mx-2">{{ $claim->street_type }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="my-3 border-bottom">
                        <h6>Вид работ: </h6>
                        <p class="fw-normal mx-2">{{ $claim->type_of_work }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="my-3 border-bottom">
                        <h6>Направление: </h6>
                        <p class="fw-normal mx-2">{{ $claim->direction }}</p>
                    </div>
                </div>
            </div>
            @if ($claim->image1 != '')
            <div class="row my-1 border-bottom">
                <div class="col">
                    <div class="">
                        <h6>Фото отчет 1 (котлован после монтажа муфт): </h6>
                    </div>
                    <div class="modal fade" id="imageModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Фото отчет 1 (котлован после монтажа муфт):</h5>
                                    <button type="button" class="close" claim-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body d-flex jusify-content-center">
                                    <!-- Image goes here -->
                                    <img src="{{ $claim->image1 != '' ? $claim->image1 : get_image()  }}" class="img-fluid" alt="image1" srcset="" style="width:100%;object-fit:cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col py-2">
                    <button type="button" claim-toggle="modal" claim-target="#imageModal1" style="border: none;outline:none">
                        <img src="{{ $claim->image1 != '' ? $claim->image1 : get_image()  }}" alt="" srcset="" id="clickableImage1" style="object-fit:cover" width="200px">
                    </button>
                </div>
            </div>
            @endif
@if ($claim->image2 != '')
<div class="row my-1 border-bottom">
    <div class="col">
        <div class="">
            <h6>Фото отчет 2 (разрытие восстановлено): </h6>
        </div>
        <div class="modal fade" id="imageModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Фото отчет 2 (разрытие восстановлено):</h5>
                        <button type="button" class="close" claim-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Image goes here -->
                        <img src="{{ $claim->image2 != '' ? $claim->image2 : get_image()  }}" class="img-fluid" alt="image1" srcset="" style="width:100%;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col py-2">
        <button type="button" claim-toggle="modal" claim-target="#imageModal2" style="border: none;outline:none">
            <img src="{{ $claim->image2 != '' ? $claim->image2 : get_image()  }}" alt="" srcset="" id="clickableImage2" style="object-fit:cover" width="200px">
        </button>
    </div>
</div>    
@endif
@if ($claim->image3 != '')

<div class="row my-1 border-bottom">
    <div class="col">
        <div class="">
            <h6>Фото отчет 3 (котлован через 15 дней): </h6>
        </div>
        <div class="modal fade" id="imageModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Фото отчет 3 (котлован через 15 дней):</h5>
                        <button type="button" class="close" claim-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Image goes here -->
                        <img src="{{ $claim->image3 != '' ? $claim->image3 : get_image()  }}" class="img-fluid" alt="image3" srcset="" style="width:100%;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col py-2">
        <button type="button" claim-toggle="modal" claim-target="#imageModal3" style="border: none;outline:none">
            <img src="{{ $claim->image3 != '' ? $claim->image3 : get_image()  }}" alt="" srcset="" id="clickableImage3" style="object-fit:cover" width="200px">
        </button>
    </div>
</div>    
@endif

            <div class="row">
                @if ($claim->date_of_sign != '0000-00-00')
                <div class="col-12 col-md-4">
                    <div class="my-3 border-bottom">
                        <h6>Месяц подписания акта выполненных работ: </h6>
                        <p class="fw-normal mx-2">{{ $claim->date_of_sign }}</p>
                    </div>
                </div>
                @endif
@if ($claim->date_of_sending != '0000-00-00')
<div class="col-12 col-md-4">
    <div class="my-3 border-bottom">
        <h6>Дата отправки заявки по правалу: </h6>
        <p class="fw-normal mx-2">{{ $claim->date_of_sending }}</p>
    </div>
</div>
@endif
@if ($claim->date_of_fixing != '0000-00-00')
<div class="col-12 col-md-4">
    <div class="my-3 border-bottom">
        <h6>Дата устранения провала: </h6>
        <p class="fw-normal mx-2">{{ $claim->date_of_fixing }}</p>
    </div>
</div>
@endif

            </div>
@if ($claim->image5 != '')
<div class="row my-1 border-bottom">
    <div class="col">
        <div class="">
            <h6>Фото отчет 5 (обнаружение провала) </h6>
        </div>
        <div class="modal fade" id="imageModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Фото отчет 5 (обнаружение провала)</h5>
                        <button type="button" class="close" claim-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Image goes here -->
                        <img src="{{ $claim->image5 != '' ? $claim->image5 : get_image()  }}" class="img-fluid" alt="image5" srcset="" style="width:100%;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col py-2">
        <button type="button" claim-toggle="modal" claim-target="#imageModal5" style="border: none;outline:none">
            <img src="{{ $claim->image5 != '' ? $claim->image5 : get_image()  }}" alt="" srcset="" id="clickableImage5" style="object-fit:cover" width="200px">
        </button>
    </div>
</div>    
@endif
@if ($claim->image6 != '')
<div class="row my-1 border-bottom">
    <div class="col">
        <div class="">
            <h6>Фото отчет 6 (устранения провала): </h6>
        </div>
        <div class="modal fade" id="imageModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel6">Фото отчет 6 (устранения провала)</h5>
                        <button type="button" class="close" claim-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Image goes here -->
                        <img src="{{ $claim->image6 != '' ? $claim->image6 : get_image()  }}" class="img-fluid" alt="image6" srcset="" style="width:100%;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col py-2">
        <button type="button" claim-toggle="modal" claim-target="#imageModal6" style="border: none;outline:none">
            <img src="{{ $claim->image6 != '' ? $claim->image6 : get_image()  }}" alt="" srcset="" id="clickableImage6" style="object-fit:cover" width="200px">
        </button>
    </div>
</div>
@endif

@if ($claim->claim_photo != '')
<div class="row my-1 border-bottom">
    <div class="col">
        <div class="">
            <h6>Фото заявки: </h6>
        </div>
        <div class="modal fade" id="imageModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel7">Фото заявки</h5>
                        <button type="button" class="close" claim-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Image goes here -->
                        <img src="{{ $claim->claim_photo != '' ? $claim->claim_photo : get_image()  }}" class="img-fluid" alt="claim_photo" srcset="" style="width:100%;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col py-2">
        <button type="button" claim-toggle="modal" claim-target="#imageModal7" style="border: none;outline:none">
            <img src="{{ $claim->claim_photo != '' ? $claim->claim_photo : get_image()  }}" alt="" srcset="" id="clickableClaimPhoto" style="object-fit:cover" width="200px">
        </button>
    </div>
</div>    
@endif


        </div>



</section>
@endsection