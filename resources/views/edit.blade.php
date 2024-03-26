@extends('layouts.app')

@section('content')

<section class="d-flex justify-content-between align-items-center flex-column my-4">
    <div class="d-flex justify-content-between align-items-center w-100 my-3">
        <h2>Редактировать {{ $claim->invent_num }}</h2>
        <a class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
            </svg></a>
    </div>

    <form class="w-100" method="POST" enctype="multipart/form-data" action="{{route('claim_edit_store',$claim->id)}}">
      @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Административный район</label>
                    <select class="form-control" id="neighborhoodSelect" name="neighborhood">
                        <option value="Алатау">Алатау</option>
                        <option value="Алмалы">Алмалы</option>
                        <option value="Ауезов">Ауезов</option>
                        <option value="Бостандык">Бостандык</option>
                        <option value="Жетысу">Жетысу</option>
                        <option value="Медеу">Медеу</option>
                        <option value="Наурызбай">Наурызбай</option>
                        <option value="Турксиб">Турксиб</option>
                    </select>
                    @error ("neighborhood")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                  
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="invent_num">Инвентарный номер</label>
                    <input value="{{ $claim->invent_num }}" name="invent_num" type="text" class="form-control" id="invent_num" aria-describedby="inventHelp" placeholder="Введите инвентарный номер">
                    
                    @error ("invent_num")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="date_of_excavation">Дата разрытия</label>
                    <input value="{{ $claim->date_of_excavation }}" name="date_of_excavation" type="date" class="form-control" id="date_of_excavation">
                    
                    @error ("date_of_excavation")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror

                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="date_recovery_ABP">Дата отправки заявки подрядчику</label>
                    <input value="{{ $claim->date_recovery_ABP }}" name="date_recovery_ABP" type="date" class="form-control" id="date_recovery_ABP">
                    
                    @error ("date_recovery_ABP")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror

                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="open_square">Площадь вскрытия АБП, м2</label>
                    <input value="{{ $claim->open_square }}" name="open_square" type="text" class="form-control" id="open_square" placeholder="Введите площадь вскрытия">
                    
                    @error ("open_square")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror

                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input value="{{ $claim->address }}" name="address" type="text" class="form-control" id="address" placeholder="Введите адрес">
                    
                    @error ("address")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="direction">Направление</label>
                    <textarea name="direction" class="form-control" id="direction">{{ $claim->direction }}</textarea>
                    
                    @error ("direction")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Тип улицы</label>
                    <select class="form-control" id="streetTypeSelect" name="street_type">
                        <option value="Магистральная">Магистральная</option>
                        <option value="Районная">Районная</option>
                    </select>

                    @error ("street_type")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="type_of_work">Вид работ</label>
                    <select class="form-control" id="typeOfWorkSelect" name="type_of_work">
                        <option value="Асфальт 5см">Асфальт 5см</option>
                        <option value="Асфальт 8см">Асфальт 8см</option>
                        <option value="Асфальт 12см">Асфальт 12см</option>
                        <option value="Временная брусчатка 5см">Временная брусчатка 5см</option>
                        <option value="Временная брусчатка 8см">Временная брусчатка 8см</option>
                        <option value="Временная брусчатка 12см">Временная брусчатка 12см</option>
                        <option value="Востанавление тротуарной плиткой (брусчатка)">Востанавление тротуарной плиткой (брусчатка)</option>
                        <option value="Газон">Газон</option>
                        <option value="Бордер (поребрик)">Бордер (поребрик)</option>
                        <option value="Вр.Брус на асфальт 5см">Вр.Брус на асфальт 5см</option>
                        <option value="Вр.Брус на асфальт 8см">Вр.Брус на асфальт 8см</option>
                        <option value="Вр.Брус на асфальт 12см">Вр.Брус на асфальт 12см</option>
                    </select>

                    @error ("type_of_work")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="date_recovery_ABP">Дата восстановления АБП</label>
                    <input value="{{ $claim->date_recovery_ABP }}" name="date_recovery_ABP" type="date" class="form-control" id="date_recovery_ABP">
                    
                    @error ("date_recovery_ABP")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="square_restored_area">Фактически восстановленная площадь м2</label>
                    <input value="{{ $claim->square_restored_area }}" name="square_restored_area" type="text" class="form-control" id="square_restored_area" placeholder="Введите фактически восстановленная площадь м2">
                    
                    @error ("square_restored_area")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="date_recovery_ABP">Месяц подписания акта выполненных работ</label>
                    <input value="{{ $claim->date_of_sign }}" name="date_of_sign" type="date" class="form-control" id="date_of_sign">
                    
                    @error ("date_of_sign")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group my-3 d-flex align-items-center justify-content-between border px-1">
                    <div>
                        <label for="exampleFormControlFile1">Фото отчет 1 (котлован после монтажа муфт)</label>
                        <input type="file" class="form-control-file d-block my-2" name="image1" onchange="display_image(this.files[0],this)">
                       
                        @error ("image1")
                        <div class="text-danger">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div>
                        <img src="{{ $claim->image1 != '' ? $claim->image1 : ""  }}" alt="" class="img-thumbnail js-image-preview" id="image1" style="width: 200px;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group my-3 d-flex d-flex align-items-center justify-content-between border px-1">
                    <div>
                        <label for="exampleFormControlFile1">Фото отчет 2 (заявка)</label>
                        <input type="file" class="form-control-file d-block my-2" name="image2" onchange="display_image(this.files[0],this)">
                    <br>
                        @error ("image2")
                        <div class="text-danger">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <img src="{{ $claim->image2 != '' ? $claim->image2 : "" }}" alt="" class="img-thumbnail js-image-preview" id="image2" style="width: 200px;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group my-3 d-flex align-items-center justify-content-between border px-1">
                    <div>
                        <label for="exampleFormControlFile1">Фото отчет 3 (разрытие востановлено)
                        </label>
                        <input type="file" class="form-control-file d-block my-2" name="image3" onchange="display_image(this.files[0],this)">
                       <br>
                        @error ("image3")
                        <div class="text-danger">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div>
                        <img src="{{ $claim->image3 != '' ? $claim->image3 : "" }}" alt="" class="img-thumbnail js-image-preview " id="image3" style="width: 200px;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group my-3 d-flex align-items-center justify-content-between border px-1">
                    <div>
                        <label for="exampleFormControlFile1">Фото отчет 4 (разрытие после востановление 15 день)
                        </label>
                        <input type="file" class="form-control-file d-block my-2" name="image3" onchange="display_image(this.files[0],this)">
                        <br>
                        @error ("image3")
                        <div class="text-danger">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div>
                        <img src="{{ $claim->image3 != '' ? $claim->image3 : "" }}" alt="" class="img-thumbnail js-image-preview " id="image3" style="width: 200px;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="date_recovery_ABP">Дата обнаружения провала</label>
                    <input value="{{ $claim->date_recovery_ABP }}" name="date_recovery_ABP" type="date" class="form-control" id="date_recovery_ABP">
                    <br>
                    @error ("date_recovery_ABP")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="date_of_sending">Дата отправки заявки по правалу</label>
                    <input value="{{ $claim->date_of_sending }}" name="date_of_sending" type="date" class="form-control" id="date_of_sending">
                    <br>
                    @error ("date_of_sending")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                </div>

            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="date_of_fixing">Дата устранения провала</label>
                    <input value="{{ $claim->date_of_fixing }}" name="date_of_fixing" type="date" class="form-control" id="date_of_fixing">
                    <br>
                    @error ("date_of_fixing")
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">
                <div class="form-group my-3 d-flex align-items-center justify-content-between border px-1">
                    <div>
                        <label for="exampleFormControlFile1">Фото отчет 5 (обнаружение провала)
                        </label>
                        <input type="file" class="form-control-file d-block my-2" name="image5" onchange="display_image(this.files[0],this)">
                  
                        @error ("image5")
                        <div class="text-danger">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div>
                        <img src="{{ $claim->image5 != '' ? $claim->image5 : "" }}" alt="" class="img-thumbnail js-image-preview " id="image5" style="width: 200px;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group my-3 d-flex align-items-center justify-content-between border px-1">
                    <div>
                        <label for="exampleFormControlFile1">Фото отчет 6 (Фото заявки по провалу)
                        </label>
                        <input type="file" class="form-control-file d-block my-2" name="claim_photo" onchange="display_image(this.files[0],this)">
                        
                        @error ("claim_photo")
                        <div class="text-danger">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div>
                        <img src="{{ $claim->claim_photo != '' ? $claim->claim_photo : "" }}" alt="" class="img-thumbnail js-image-preview " id="claim_photo" style="width: 200px;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group my-3 d-flex align-items-center justify-content-between border px-1">
                    <div>
                        <label for="exampleFormControlFile1">Фото отчет 7 (устранения провала)
                        </label>
                        <input type="file" class="form-control-file d-block my-2" name="image6" onchange="display_image(this.files[0],this)">
                      
                        @error ("image6")
                        <div class="text-danger">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div>
                        <img src="{{ $claim->image6 != '' ? $claim->image6 : "" }}" alt="" class="img-thumbnail js-image-preview " id="image6" style="width: 200px;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-end my-3">
            <button type="submit" class="btn btn-primary" onclick="showSpinner()">Сохранить</button>
        </div>
    </form>
    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true" claim-backdrop="static" claim-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="background-color: rgba(255, 255, 255, 0);">
                <div class="modal-body text-center" style="background-color: rgba(255, 255, 255, 0);">
                    <div class="spinner-border text-light" role="status" style="width:150px;height:150px">
                        <span class="visually-hidden">Разрузка...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    function display_image(file, inputTag) {
        query = '';
        switch (inputTag.name) {
            case 'image1':
                query = 'image1';
                break;
            case 'image2':
                query = 'image2';
                break;
            case 'image3':
                query = 'image3';
                break;
            case 'image4':
                query = 'image4';
                break;
            case 'image5':
                query = 'image5';
                break;
            case 'image6':
                query = 'image6';
                break;
            case 'claim_photo':
                query = 'claim_photo';
                break;
            default:
                break
        }
        document.querySelector(`#${query}`).src = URL.createObjectURL(file)
    }

    function setSelectedOption(selectId, valueToMatch) {
        // Get the select element
        var selectElement = document.getElementById(selectId);

        // Loop through the options
        for (var i = 0; i < selectElement.options.length; i++) {
            // Check if the option's value matches the given string
            if (selectElement.options[i].value === valueToMatch) {
                // Set the selected attribute to true for the matching option
                selectElement.options[i].selected = true;
                break; // Exit the loop since we found a match
            }
        }
    }

    // Example usage
    var neighborhoodSelect = "neighborhoodSelect";
    var neighborhood = {{ json_encode($claim->neighborhood)  }};
    var streetTypeSelect = "streetTypeSelect";
    var streetType = {{ json_encode($claim->street_type)  }};
    var typeOfWorkSelect = "typeOfWorkSelect";
    var typeOfWork = {{ json_encode($claim->type_of_work)  }};
    setSelectedOption(neighborhoodSelect, neighborhood);
    setSelectedOption(streetTypeSelect, streetType);
    setSelectedOption(typeOfWorkSelect, typeOfWork);

    function showSpinner() {
        // Show the modal when the form is submitted
        $('#loadingModal').modal('show');
    }
</script>
@endsection