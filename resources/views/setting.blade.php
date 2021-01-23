@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Multi Post</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <div class="col-md-12">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>{{ $error }}</li>
            </ul>
        </div>
        @endforeach @if (Session::has("success"))
        <div class="alert alert-success">
            <ul>
                <li>{{ Session::get("success") }}</li>
            </ul>
        </div>
        @endif
    </div>
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
      
       
        <!-- Main row -->
        <div class="row first-row">
           <!-- Left col -->
           <section class="col-lg-12 col-12 ">
            
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fas fa-cog mr-1"></i>
                 Settings
                </h3>
    
                <div class="card-tools">
                 
                </div>
              </div>
              <!-- /.card-header -->
             
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="card card-primary card-outline card-tabs">
                      <div class="card-header p-0 pt-1 border-bottom-0">
                        
                      </div>
                      <div class="card-body">
                        <div >
                          
                        
                          
                          <div >
                            <div class="row">
                              <div class="col-2 col-sm-2">
  
                                
  
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                  <a class="nav-link alert text-primary btn btn-app active" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="true">
                                    <i class="fas fa-user"></i> Profile
                                   </a>
                                  <a class="nav-link btn btn-app text-primary alert" id="vert-tabs-branding-tab" data-toggle="pill" href="#vert-tabs-branding" role="tab" aria-controls="vert-tabs-branding" aria-selected="false"><i class="fas fa-paint-brush"></i> Branding</a>
                                  <a class="nav-link btn btn-app text-primary alert" id="vert-tabs-white-label-tab" data-toggle="pill" href="#vert-tabs-white-label" role="tab" aria-controls="vert-tabs-white-label" aria-selected="false"><i class="fas fa-bookmark"></i> White Label</a>
                                  <a class="nav-link btn btn-app text-primary alert" id="vert-tabs-notification-tab" data-toggle="pill" href="#vert-tabs-notification" role="tab" aria-controls="vert-tabs-notification" aria-selected="false"><i class="fas fa-bell"></i> Notification</a>
                                  <a class="nav-link btn btn-app text-primary alert" id="vert-tabs-tos-setup-tab" data-toggle="pill" href="#vert-tabs-tos-setup" role="tab" aria-controls="vert-tabs-tos-setup" aria-selected="false"><i class="fas fa-file "></i> TOS Setup</a>
                                </div>
                              </div>
                              <div class="col-10 col-sm-10">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                  <div class="tab-pane text-left fade show active" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                     <div class="row">
                                       <div class="col-lg-8"> 
                                       
                                        <div class="card card-default">
                                            {!! Form::open(['action' => 'HomeController@setUpdate', 'id' => 'form']) !!}
                                            {!! Form::token() !!}
                                          <div class="card-header">
                                            <h3 class="card-title">
                                              <i class="fas fa-user text-primary mr-1"></i>
                                              ACCOUNT SETTINGS
                                            </h3>
                                
                                            <div class="card-tools">
                                            
                                            </div>
                                          </div>
                                          <!-- /.card-header -->
                                          <div class="card-body">
                                            <div class="card card-primary ">
                                              <div class="card-header">
                                                <h3 class="card-title">Company Info</h3>
                                
                                                <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-3 col-form-label">Company Name </label>
                                                  <div class="col-sm-9">
                                                    <input name="c_name" type="text" class="form-control" id="name"  value="{{$data->company_name}}">
                                                  </div>
                                                </div><!--form-group-->
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-3 col-form-label">Address </label>
                                                  <div class="col-sm-9">
                                                    <input name="c_address" type="text" class="form-control" id="address"  value="{{$data->company_address}}">
                                                  </div>
                                                </div><!--form-group-->
  
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-3 col-form-label">City </label>
                                                  <div class="col-sm-9">
                                                    <input name="c_city" type="text" class="form-control" id="city"  value="{{$data->company_city}}">
                                                  </div>
                                                </div><!--form-group-->
  
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-3 col-form-label">State/Region </label>
                                                  <div class="col-sm-9">
                                                    <div class="row">
                                                      <div class="col-sm-8">
                                                    <input name="c_state" type="text" class="form-control" id="city"  value="{{$data->company_state}}">
                                                    </div>
                                                    <div class="col-sm-4">
                                                      <div class="form-group row">
                                                        <label for="name" class="col-sm-3 col-form-label">Zip </label>
                                                        <div class="col-sm-9">
                                                          <input name="c_zip" type="text" class="form-control" id="name"  value="{{$data->company_zip}}">
                                                        </div>
                                                      </div><!--form-group-->
                                                    </div>
                                                    </div>
                                                  </div>
                                                </div><!--form-group-->
  
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-3 col-form-label">Country </label>
                                                  <div class="col-sm-9">
                                                    <select name="c_country" class="form-control select2bs4" style="width: 100%;">
                                                    <option selected>{{$data->company_country}}</option>
                                                      <option >Afghanistan</option>
                                                      <option>Albania</option>
                                                      <option>Algeria</option>
                                                      <option>American Samoa</option>
                                                      <option>Andorra</option>
                                                      <option>Angola</option>
                                                      <option>Anguilla</option>
                                                      <option>Antigua and Barbuda</option>
                                                      <option>Argentina</option>
                                                      <option>Armenia</option>
                                                      <option>Aruba</option>
                                                      <option>Australia</option>
                                                      <option>Austria</option>
                                                      <option>Azerbaijan</option>
                                                      <option>Bahamas</option>
                                                      <option>Bahrain</option>
                                                      <option>Bangladesh</option>
                                                      <option>Barbados</option>
                                                      <option>Belarus</option>
                                                      <option>Belgium</option>
                                                      <option>Belize</option>
                                                      <option>Benin</option>
                                                      <option>Bermuda</option>
                                                      <option>Bhutan</option>
                                                      <option>Bolivia, Plurinational State of</option>
                                                      <option >Bosnia and Herzegovina</option>
                                                      <option>Botswana</option>
                                                      <option>Bouvet Island</option>
                                                      <option>Brazil</option>
                                                      <option>British Indian Ocean Territory</option>
                                                      <option>Brunei Darussalam  </option>
                                                      <option>Bulgaria</option>
                                                      <option>Burkina Faso</option>
                                                      <option>Burundi</option>
                                                      <option>Cambodia</option>
                                                      <option>Cameroon</option>
                                                      <option>Canada</option>
                                                      <option>Cape Verde</option>
                                                      <option>Cayman Islands</option>
                                                      <option>Central African Republic</option>
                                                      <option>Chad</option>
                                                      <option>Chile</option>
                                                      <option>China</option>
                                                      <option>Colombia</option>
                                                      <option>Comoros</option>
                                                      <option>Congo</option>
                                                      <option>Congo, the Democratic Republic of the</option>
                                                      <option>Cook Islands</option>
                                                      <option>Costa Rica</option>
                                                      <option>CÃ´te d'Ivoire</option>
                                                      <option >Croatia</option>
                                                      <option>Cuba</option>
                                                      <option>CuraÃ§ao</option>
                                                      <option>Cyprus</option>
                                                      <option>Czech Republic</option>
                                                      <option>Denmark</option>
                                                      <option>Djibouti</option>
                                                      <option>Dominica</option>
                                                      <option>Dominican Republic</option>
                                                      <option>Ecuador</option>
                                                      <option>Egypt</option>
                                                      <option>El Salvador</option>
                                                      <option>Equatorial Guinea</option>
                                                      <option>Eritrea</option>
                                                      <option>Estonia</option>
                                                      <option>Ethiopia</option>
                                                      <option>Falkland Islands (Malvinas)</option>
                                                      <option>Faroe Islands</option>
                                                      <option>Fiji</option>
                                                      <option>Finland</option>
                                                      <option>France</option>
                                                      <option>French Guiana</option>
                                                      <option>French Polynesia</option>
                                                      <option>French Southern Territories</option>
                                                      <option>Gabon</option>
                                                      <option >Gambia</option>
                                                      <option>Georgia</option>
                                                      <option>Germany</option>
                                                      <option>Ghana</option>
                                                      <option>Gibraltar</option>
                                                      <option>Greece</option>
                                                      <option>Greenland</option>
                                                      <option>Grenada</option>
                                                      <option>Guadeloupe</option>
                                                      <option>Guam</option>
                                                      <option>Guatemala</option>
                                                      <option>Guernsey</option>
                                                      <option>Guinea</option>
                                                      <option>Guinea-Bissau</option>
                                                      <option>Guyana</option>
                                                      <option>Haiti</option>
                                                      <option>Heard Island and McDonald Islands</option>
                                                      <option>Holy See (Vatican City State)</option>
                                                      <option>Honduras</option>
                                                      <option>Honduras</option>
                                                      <option>Hungary</option>
                                                      <option>Iceland</option>
                                                      <option>India</option>
                                                      <option>Indonesia</option>
                                                      <option>Iran, Islamic Republic of</option>
                                                      <option >Iraq</option>
                                                      <option>Ireland</option>
                                                      <option>Isle of Man</option>
                                                      <option>Israel</option>
                                                      <option>Italy</option>
                                                      <option>Jamaica</option>
                                                      <option>Japan</option>
                                                      <option>Jersey</option>
                                                      <option>Jordan</option>
                                                      <option>Kazakhstan</option>
                                                      <option>Kenya</option>
                                                      <option>Kiribati</option>
                                                      <option>Korea, Democratic People's Republic of</option>
                                                      <option>Korea, Republic of</option>
                                                      <option>Kuwait</option>
                                                      <option>Kyrgyzstan</option>
                                                      <option>Lao People's Democratic Republic</option>
                                                      <option>Latvia</option>
                                                      <option>Lebanon</option>
                                                      <option>Lesotho</option>
                                                      <option>Liberia</option>
                                                      <option>Libya</option>
                                                      <option>Liechtenstein</option>
                                                      <option>Lithuania</option>
                                                      <option>Luxembourg</option>
                                                      <option >Macao</option>
                                                      <option>Macedonia, the former Yugoslav Republic of</option>
                                                      <option>Madagascar</option>
                                                      <option>Malawi</option>
                                                      <option>Malaysia</option>
                                                      <option>Maldives</option>
                                                      <option>Mali</option>
                                                      <option>Malta</option>
                                                      <option>Marshall Islands</option>
                                                      <option>Martinique</option>
                                                      <option>Mauritania</option>
                                                      <option>Mauritius</option>
                                                      <option>Mayotte</option>
                                                      <option>Mexico</option>
                                                      <option>Micronesia, Federated States of</option>
                                                      <option>Moldova, Republic of</option>
                                                      <option>Monaco</option>
                                                      <option>Mongolia</option>
                                                      <option>Montenegro</option>
                                                      <option>Montserrat</option>
                                                      <option>Morocco</option>
                                                      <option>Mozambique</option>
                                                      <option>Myanmar</option>
                                                      <option>Namibia</option>
                                                      <option>Nauru</option>
                                                      <option>Nepal</option>
                                                      <option>Netherlands</option>
                                                      <option>New Caledonia</option>
                                                      <option>New Zealand</option>
                                                      <option>Nicaragua</option>
                                                      <option>Niger</option>
                                                      <option>Nigeria</option>
                                                      <option>Niue</option>
                                                      <option>Norfolk Island</option>
                                                      <option>Northern Mariana Islands</option>
                                                      <option >Norway</option>
                                                      <option>Oman</option>
                                                      <option>Pakistan</option>
                                                      <option>Palau</option>
                                                      <option>Palestinian Territory, Occupied</option>
                                                      <option>Panama</option>
                                                      <option>Papua New Guinea</option>
                                                      <option>Paraguay</option>
                                                      <option>Peru</option>
                                                      <option>Philippines</option>
                                                      <option>Pitcairn</option>
                                                      <option>Poland</option>
                                                      <option>Portugal</option>
                                                      <option>Puerto Rico</option>
                                                      <option>Qatar</option>
                                                      <option>RÃ©union</option>
                                                      <option>Romania</option>
                                                      <option>Russian Federation</option>
                                                      <option>Rwanda</option>
                                                      <option>Saint Helena, Ascension and Tristan da Cunha</option>
                                                      <option>Saint Kitts and Nevis</option>
                                                      <option>Saint Lucia</option>
                                                      <option>Saint Martin (French part)</option>
                                                      <option>Saint Pierre and Miquelon</option>
                                                      <option>Saint Vincent and the Grenadines</option>
                                                      <option>Samoa</option>
                                                      <option>San Marino</option>
                                                      <option>Sao Tome and Principe</option>
                                                      <option>Saudi Arabia</option>
                                                      <option>Senegal</option>
                                                      <option>Serbia</option>
                                                      <option>Seychelles</option>
                                                      <option>Sierra Leone</option>
                                                      <option >Singapore</option>
                                                      <option>Sint Maarten (Dutch part)</option>
                                                      <option>Slovakia</option>
                                                      <option>Slovenia</option>
                                                      <option>Solomon Islands</option>
                                                      <option>Somalia</option>
                                                      <option>South Africa</option>
                                                      <option>South Georgia and the South Sandwich Islands</option>
                                                      <option>South Sudan</option>
                                                      <option>Spain</option>
                                                      <option>Sri Lanka</option>
                                                      <option>Sudan</option>
                                                      <option>Suriname</option>
                                                      <option>Swaziland</option>
                                                      <option>Sweden</option>
                                                      <option>Switzerland</option>
                                                      <option>Syrian Arab Republic</option>
                                                      <option>Taiwan, Province of China</option>
                                                      <option>Tajikistan</option>
                                                      <option>Tanzania, United Republic of</option>
                                                      <option>Thailand</option>
                                                      <option>Timor-Leste</option>
                                                      <option>Togo</option>
                                                      <option>Tokelau</option>
                                                      <option>Tonga</option>
                                                      <option>Trinidad and Tobago</option>
                                                      <option>Tunisia</option>
                                                      <option >Turkey</option>
                                                      <option>Turkmenistan</option>
                                                      <option>Turks and Caicos Islands</option>
                                                      <option>Tuvalu</option>
                                                      <option>Uganda</option>
                                                      <option>Ukraine</option>
                                                      <option>United Arab Emirates</option>
                                                      <option>United Kingdom</option>
                                                      <option>United States</option>
                                                      <option>United States Minor Outlying Islands</option>
                                                      <option>Uruguay</option>
                                                      <option>Uzbekistan</option>
                                                      <option>Vanuatu</option>
                                                      <option>Venezuela, Bolivarian Republic of</option>
                                                      <option>Viet Nam</option>
                                                      <option>Virgin Islands, British</option>
                                                      <option>Virgin Islands, U.S.</option>
                                                      <option>Wallis and Futuna</option>
                                                      <option>Western Sahara</option>
                                                      <option>Yemen</option>
                                                      <option>Zambia</option>
                                                      <option>Zimbabwe</option>
                                                     
                                                     
                                                    </select>
                                                  </div>
                                                </div><!--form-group-->
  
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-3 col-form-label">Website URL </label>
                                                  <div class="col-sm-9">
                                                    <input name="website" type="text" class="form-control" id="city"  value="{{$data->website}}">
                                                  </div>
                                                </div><!--form-group-->
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card-posting-time -->
            
                                            <div class="card card-primary ">
                                              <div class="card-header">
                                                <h3 class="card-title">COMPANY CONTACT INFO</h3>
                                
                                                <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-3 col-form-label">Business Phone </label>
                                                  <div class="col-sm-9">
                                                    <input name="c_phone" value="{{$data->company_phone}}" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                                  </div>
                                                </div><!--form-group-->
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-3 col-form-label">Contact Name </label>
                                                  <div class="col-sm-9">
                                                    <input name="con_name" type="text" class="form-control" id="name" value="{{$data->contact_name}}">
                                                  </div>
                                                </div>
  
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-3 col-form-label">Mobile </label>
                                                  <div class="col-sm-9">
                                                  <input name="con_phone" value="{{$data->contact_phone}}" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                                  </div>
                                                </div><!--form-group-->
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-3 col-form-label">Contact Email </label>
                                                  <div class="col-sm-9">
                                                    <input disabled type="email" class="form-control" id="email"  value="{{$data->email}}">
                                                  </div>
                                                </div><!--form-group-->
                                                  
          
                                                      
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card-Select-Network -->
            
                                          
                                          
                                          </div>
                                          <!-- /.card-body -->
                                        
                                          <div class="card-footer clearfix">
                                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-check mr-2"></i> Update </button>
                                          </div><!--card-footer-->

                                          {!!Form::close()!!}
                                        </div><!--card-->
                                      
                                     
                                     </div><!--column-8-->
                                       <div class="col-lg-4">
                                       
                                     
                                      
                                     
                                      
                                  </div><!--column-4-->
                                     </div><!--row-->
                                    
                                  </div><!--/ First-Tab-->
                                  <div class="tab-pane fade" id="vert-tabs-branding" role="tabpanel" aria-labelledby="vert-tabs-branding-tab">
                                    <div class="row">
                                      <div class="col-lg-6"> 
                                       
                                        <div class="card card-default">
                                          <div class="card-header">
                                            <h3 class="card-title">
                                              <i class="fas fa-paint-brush text-primary mr-1"></i>
                                              Branding
                                            </h3>
                                
                                            <div class="card-tools">
                                            
                                            </div>
                                          </div>
                                          <!-- /.card-header -->
                                          <div class="card-body">
                                            <div class="card card-primary ">
                                              <div class="card-header">
                                                <h3 class="card-title">REPORT BRANDING</h3>
                                
                                                <div class="card-tools">
                                                 
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                              <h6 class="text-muted">You can brand your report with your agency
                                                name or logo image.</h6>
                                                <ul class="list-group list-group-unbordered mt-3">
                                                  <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <a  class="text-muted"><i class="nav-icon far fa-image mr-1"></i>Logo</a>
                                                    <div class="custom-control custom-switch">
                                                      <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                      <label class="custom-control-label" for="customSwitch1"></label>
                                                    </div>
                                                  </li>
                                                  <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <a class="text-muted"><i class="nav-icon far fa-star mr-1"></i>Branding</a>
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                      <label class="btn bg-primary active">
                                                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Text
                                                      </label>
                                                      <label class="btn bg-primary">
                                                        <input type="radio" name="options" id="option2" autocomplete="off"> Image
                                                      </label>
                                                     
                                                    </div>
                                                  </li>
                                                  <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <a  class="text-muted"><i class="nav-icon fas fa-paint-brush mr-1"></i> Primary Branding Color</a>
                                                    <div class="form-group mb-0">
                                                     
                                                      <input type="text" class="form-control my-colorpicker1">
                                                    </div>
                                                  </li>
                                                </ul>
                                              
                                              </div>
                                              <!-- /.card-body -->
                                              <div class="card-footer clearfix">
                                                <button type="button" class="btn btn-primary float-right"><i class="fas fa-check mr-2"></i> Save </button>
                                              </div>
                                            </div>
                                            <!-- /.card-posting-time -->
            
                                           
            
                                          
                                          
                                          </div>
                                          <!-- /.card-body -->
                                        
                                       
                                        </div>
                                     
                                    
                                    </div><!--column-6-->
                                      <div class="col-lg-6">
                                      
                                        <div class="card card-default">
                                          <div class="card-header">
                                            <h3 class="card-title">
                                              <span ><img class="small-logo" src="../../dist/img/small-logo.png"></span>
                                              <span class="ml-2" ><img class="medium-logo " src="../../dist/img/medium-logo.png"></span>
                                            </h3>
                                
                                            <div class="card-tools">
                                            
                                            </div>
                                          </div>
                                          <!-- /.card-header -->
                                          <div class="card-body p-0">
                                            <img class="img-fluid" src="../../dist/img/branding-img.png">
                                          </div>
                                          <!-- /.card-body -->
                                        
                                       
                                       
                                     
                                    
                                     </div>
                                     <!-- /.card -->
         </div><!--column-6-->
                                    </div><!--row-->
                                   
                                  </div>
                                  <div class="tab-pane fade" id="vert-tabs-white-label" role="tabpanel" aria-labelledby="vert-tabs-white-label-tab">
                                   
                                     
                                        <div class="card card-default">
                                          <div class="card-header">
                                            <h3 class="card-title">
                                              <i class="fas  fa-bookmark text-primary mr-1"></i>
                                              WHITE LABEL
                                            </h3>
                                
                                            <div class="card-tools">
                                            
                                            </div>
                                          </div>
                                          <!-- /.card-header -->
                                          <div class="row">
                                            <div class="col-lg-6">
                                          <div class="card-body">
                                            <div class="card card-primary ">
                                              <div class="card-header">
                                                <h3 class="card-title">CUSTOM SUBDOMAIN</h3>
                                
                                                <div class="card-tools">
                                                 
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                <h6 >Choose custom subdomain name.</h6>
                                                <div class="form-group d-flex align-items-center">
                                                 <span>https://</span>
                                                   <input type="text" class="form-control inline" id="name" value="Neovora" disabled>
                                                    <span> .socialmediasite.com</span>
                                                  </div>
                                                  <h6 class="text-muted">Note - You cannot change this subdomain after setting it up.</h6>
                                              
                                          </div>
                                          <!-- /.card-body -->
                                        </div><!--card-->
                                        <div class="card card-primary ">
                                          <div class="card-header">
                                            <h3 class="card-title">WHITE LABEL DOMAIN</h3>
                            
                                            <div class="card-tools">
                                             
                                              </button>
                                            </div>
                                            <!-- /.card-tools -->
                                          </div>
                                          <!-- /.card-header -->
                                          <div class="card-body">
                                            <h6 >To use a white label domain, please add a domain below and follow the Instructions.</h6>
                                            <div class="form-group row">
                                              <label for="name" class="col-sm-2 col-form-label">Domain </label>
                                              <div class="col-sm-7">
                                                <input type="text" class="form-control" id="name" placeholder="Example: www.yourdomainname.com">
                                              </div>
                                              <button type="button" class="btn   btn-sm text-uppercase col-sm-1"><i class=" fas fa-times text-danger "></i> </button>
                                              <button type="button" class="btn  bg-gradient-primary btn-sm text-uppercase col-sm-2"><i class="fas fa-plus mr-2 "></i>Add </button>
                                            </div>
                                            <div class="row">
                                              <div class="col-sm-2"></div>
                                              <div class="col-sm-7 ">
                                                <div class="info-box ">
                                                 <i class="fas fa-info-circle text-danger "></i>
                                    
                                                  <div class="ml-2">
                                                    <h6 class="text-danger m-0">IMPORTANT: Do NOT Use http://www. In Domain.</h6>
                                                  </div>
                                                  <!-- /.info-box-content -->
                                                </div>
                                              </div><!--column-7-->
                                            </div><!--row-->
  
                                            <div class="row">
                                              <div class="col-sm-2"></div>
                                              <div class="col-sm-7 ">
                                                <div class="info-box ">
                                                 <i class="fas fa-info-circle text-info"></i>
                                    
                                                  <div class="ml-2">
                                                    <h6 class="text-info m-0">IMPORTANT: You must go to your domain hosting account and POINT the " A RECORD" for your domain to the "TARGET IP ADDRESS 34.232.220.180" that is listed on the right hand side.</h6>
                                                  </div>
                                                  <!-- /.info-box-content -->
                                                </div>
                                              </div><!--column-7-->
                                            </div><!--row-->
                                             
                                          
                                      </div>
                                      <!-- /.card-body -->
                                      <div class="card-footer clearfix">
                                        <button type="button" class="btn btn-primary float-right"><i class="fas fa-check mr-2"></i> Save </button>
                                      </div>
                                    </div><!--card-->
                                       </div>
                                       
                                        </div><!--column-6-->
                                        <div class="col-lg-6">
                                          <div class="card-body">
                                          <div class="card card-primary ">
                                            <div class="card-header">
                                              <h3 class="card-title">WHITE LABEL INSTRUCTIONS</h3>
                              
                                              <div class="card-tools">
                                               
                                                </button>
                                              </div>
                                              <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                              <div class="form-group row">
                                                <label for="name" class="col-sm-6 col-form-label">1. Choose Domain Provider </label>
                                                <div class="col-sm-6">
                                                  <select class="form-control">
                                                    <option>Hostgator</option>
                                                    <option>Godaddy</option>
                                                    <option>NameCheap</option>
                                                  
                                                  </select>
                                                </div>
                                              </div><!--form-group-->
  
                                              <div class="form-group row">
                                                <label for="name" class="col-sm-6 col-form-label">2. Choose Domain Type </label>
                                                <div class="col-sm-6">
                                                  <select class="form-control">
                                                    <option>Sub Domain</option>
                                                    <option>Full Domain </option>
                                                     </select>
                                                  <span class="info float-right">Ex: site.com
                                                  </span>
                                                </div>
                                              </div><!--form-group-->
                                              <h5>Domains Instructions</h5>
                                              <h6>To get your domain linked to the whitelabel all you’ll need to do is to go to your Godaddy account and add an A record that points to your Whitelabel.</h6>
                                               <h6>For example you would create an A record pointing to:</h6>
                                               <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>Record</th>
                                                    <th>Target IP Address</th>
                                                   
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>A</td>
                                                    <td>34.232.220.180</td>
                                                   
                                                  </tr>
                                                 
                                                </tbody>
                                              </table>
                                              <h6 class="mt-2">For step-by-step instructions on how to setup an A record on Godaddy .</h6>
                                              <button type="button" class="btn orange-button m-auto d-flex align-items-center"><i class="fas fa-question-circle mr-2"></i>  Play Help Video
                                              </button>
                                        </div>
                                        <!-- /.card-body -->
                                      </div><!--card-->
                                      </div><!--card-body-->
                                        </div><!--column-6-->
                                        </div><!--row-->
                                     
                                    
                                   
                                   
                                  </div>
                                  </div>
                                  <div class="tab-pane fade" id="vert-tabs-notification" role="tabpanel" aria-labelledby="vert-tabs-notification-tab">
                                    <div class="card card-default">
                                      <div class="card-header">
                                        <h3 class="card-title">
                                          <i class="fas  fa-bookmark text-primary mr-1"></i>
                                          WHITE LABEL
                                        </h3>
                            
                                        <div class="card-tools">
                                        
                                        </div>
                                      </div>
                                      <!-- /.card-header -->
                                      <div class="row">
                                        <div class="col-lg-6 ">
                                          <div class="card-body">
                                         
                          
                                            <ul class="nav nav-tabs nav-pills inline-flex  " id="custom-tabs-three-tab" role="tablist">
                                              <li class="nav-item">
                                                <a class="nav-link  active" id="custom-tabs-three-lead-tab" data-toggle="pill" href="#custom-tabs-three-lead" role="tab" aria-controls="custom-tabs-three-lead" aria-selected="true"> <i class="nav-icon fas fa-user mr-1"></i> Lead alerts</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-agency-tab" data-toggle="pill" href="#custom-tabs-three-agency" role="tab" aria-controls="custom-tabs-three-agency" aria-selected="false"> <i class="nav-icon far fa-building mr-1"></i> Agency
                                                  Automation Alerts</a>
                                              </li>
                                             
                                            
                                            </ul>
                                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-three-lead" role="tabpanel" aria-labelledby="custom-tabs-three-lead-tab">
                                              <div class="card-body">
                                             <h6>Where Do You Want To Send Conversion Notifications?</h6>
                                             <div class="form-group mt-4">
                                              <label><i class="fas fa-envelope mr-2 text-primary"></i>Email</label>
                                              <input type="text" class="form-control" placeholder="Enter Email Address...">
                                            </div><!--form-group-->
  
                                            <div class="form-group">
                                              <label><i class="fas fa-mobile-alt mr-2 text-primary"></i>Mobile Phone</label>
                                              <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(99) 99999-99999&quot;" data-mask="" im-insert="true">
                                            </div><!--form-group-->
                                            <div class="form-group">
                                            
                                            <label><i class="fas fa-mobile-alt mr-2 text-primary"></i>Mobile Notification Times</label>
                                            
                                              </div>
                                              <div class="form-group">
                                                
                                              <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkbox-mon" >
                                                <label for="checkbox-mon">
                                                 Mon
                                                </label>
                                              </div><!--checkbox-Monday-->
                                              <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkbox-tue" >
                                                <label for="checkbox-tue">
                                                 Tue
                                                </label>
                                              </div><!--checkbox-Monday-->
                                              <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkbox-wed" >
                                                <label for="checkbox-wed">
                                                 Wed
                                                </label>
                                              </div><!--checkbox-Monday-->
                                              <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkbox-thu" >
                                                <label for="checkbox-thu">
                                                 Thu
                                                </label>
                                              </div><!--checkbox-Monday-->
                                              <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkbox-fri" >
                                                <label for="checkbox-fri">
                                                 Fri
                                                </label>
                                              </div><!--checkbox-Monday-->
                                              <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkbox-sat" >
                                                <label for="checkbox-sat">
                                                 Sat
                                                </label>
                                              </div><!--checkbox-Monday-->
                                              <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkbox-sun" >
                                                <label for="checkbox-sun">
                                                 Sun
                                                </label>
                                              </div><!--checkbox-Monday-->
                                             
                                            </div><!--form-group-->
  
                                            <div class="row">
                                              <div class="col-sm-6">
                                            <div class="form-group">
                                              <label>From:</label>
                                              <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/>
                                                <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                                </div>
                                              <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                            </div><!--column-5-->
                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                <label>To:</label>
                                                <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                                  <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/>
                                                  <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                                  </div>
                                                <!-- /.input group -->
                                              </div>
                                              <!-- /.form group -->
                                              </div><!--column-5-->
                                            
                                            </div><!--row-->
                                            <div class="card-footer clearfix">
                                              <button type="button" class="btn btn-primary float-right"><i class="fas fa-check mr-2"></i> Save </button>
                                            </div>
  
                                            </div><!--card-body-->
  
                                           
                                             
                  
                                            
                                             
                                              </div>
                                              <!--Lead-Alerts-End-->
                  
                                              <div class="tab-pane fade show " id="custom-tabs-three-agency" role="tabpanel" aria-labelledby="custom-tabs-three-agency-tab">
                                    
                                             
                                                <div class="card-body">
                                                  <h6>Where Do You Want To Send Notifications When Automation Is Done?</h6>
                                                  <div class="form-group mt-4">
                                                   <label><i class="fas fa-envelope mr-2 text-primary"></i>Email</label>
                                                   <input type="text" class="form-control" placeholder="Enter Email Address...">
                                                 </div><!--form-group-->
       
                                                 <div class="form-group">
                                                   <label><i class="fas fa-mobile-alt mr-2 text-primary"></i>Mobile Phone</label>
                                                   <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(99) 99999-99999&quot;" data-mask="" im-insert="true">
                                                 </div><!--form-group-->
                                                 <div class="form-group">
                                                 
                                                 <label><i class="fas fa-mobile-alt mr-2 text-primary"></i>Mobile Notification Times</label>
                                                 
                                                   </div>
                                                   <div class="form-group">
                                                     
                                                   <div class="icheck-primary d-inline">
                                                     <input type="checkbox" id="checkbox-mon1" >
                                                     <label for="checkbox-mon1">
                                                      Mon
                                                     </label>
                                                   </div><!--checkbox-Monday-->
                                                   <div class="icheck-primary d-inline">
                                                     <input type="checkbox" id="checkbox-tue1" >
                                                     <label for="checkbox-tue1">
                                                      Tue
                                                     </label>
                                                   </div><!--checkbox-Monday-->
                                                   <div class="icheck-primary d-inline">
                                                     <input type="checkbox" id="checkbox-wed1" >
                                                     <label for="checkbox-wed1">
                                                      Wed
                                                     </label>
                                                   </div><!--checkbox-Monday-->
                                                   <div class="icheck-primary d-inline">
                                                     <input type="checkbox" id="checkbox-thu1" >
                                                     <label for="checkbox-thu1">
                                                      Thu
                                                     </label>
                                                   </div><!--checkbox-Monday-->
                                                   <div class="icheck-primary d-inline">
                                                     <input type="checkbox" id="checkbox-fri1" >
                                                     <label for="checkbox-fri1">
                                                      Fri
                                                     </label>
                                                   </div><!--checkbox-Monday-->
                                                   <div class="icheck-primary d-inline">
                                                     <input type="checkbox" id="checkbox-sat1" >
                                                     <label for="checkbox-sat1">
                                                      Sat
                                                     </label>
                                                   </div><!--checkbox-Monday-->
                                                   <div class="icheck-primary d-inline">
                                                     <input type="checkbox" id="checkbox-sun1" >
                                                     <label for="checkbox-sun1">
                                                      Sun
                                                     </label>
                                                   </div><!--checkbox-Monday-->
                                                  
                                                 </div><!--form-group-->
       
                                                 <div class="row">
                                                   <div class="col-sm-6">
                                                 <div class="form-group">
                                                   <label>From:</label>
                                                   <div class="input-group date" id="timepicker3" data-target-input="nearest">
                                                     <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/>
                                                     <div class="input-group-append" data-target="#timepicker3" data-toggle="datetimepicker">
                                                         <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                     </div>
                                                     </div>
                                                   <!-- /.input group -->
                                                 </div>
                                                 <!-- /.form group -->
                                                 </div><!--column-5-->
                                                 <div class="col-sm-6">
                                                   <div class="form-group">
                                                     <label>To:</label>
                                                     <div class="input-group date" id="timepicker4" data-target-input="nearest">
                                                       <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/>
                                                       <div class="input-group-append" data-target="#timepicker4" data-toggle="datetimepicker">
                                                           <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                       </div>
                                                       </div>
                                                     <!-- /.input group -->
                                                   </div>
                                                   <!-- /.form group -->
                                                   </div><!--column-5-->
                                                 
                                                 </div><!--row-->
                                                 <div class="card-footer clearfix">
                                                   <button type="button" class="btn btn-primary float-right"><i class="fas fa-check mr-2"></i> Save </button>
                                                 </div>
       
                                                 </div><!--card-body-->
                                              </div>
                                             
                                   </div><!--card-body-->
                                    </div><!--column-6-->
                                    <div class="col-lg-6">
                                      
                                    </div><!--column-6-->
                                    </div><!--row-->
                                 
                                
                               
                               
                              </div>
                                   </div>
                                  </div><!--notification-->
  
                                  <div class="tab-pane fade" id="vert-tabs-tos-setup" role="tabpanel" aria-labelledby="vert-tabs-tos-setup-tab">
                                    <div class="card card-default">
                                      <div class="card-header">
                                        <h3 class="card-title">
                                          <i class="fas  fas fa-lock text-primary mr-1"></i>
                                          TERMS OF SERVICE SETUP
                                        </h3>
                            
                                        <div class="card-tools">
                                        
                                        </div>
                                      </div>
                                      <!-- /.card-header -->
                                      <div class="row">
                                        <div class="col-lg-12 ">
                                          <div class="card-body">
                                         
                          
                                            <ul class="nav nav-tabs nav-pills inline-flex  " id="custom-tabs-three-tab" role="tablist">
                                              <li class="nav-item">
                                                <a class="nav-link  active" id="custom-tabs-three-terms-tab" data-toggle="pill" href="#custom-tabs-three-terms" role="tab" aria-controls="custom-tabs-three-terms" aria-selected="true"> <i class="nav-icon fas fa-align-justify mr-1"></i>  Terms Of Service</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-privacy-tab" data-toggle="pill" href="#custom-tabs-three-privacy" role="tab" aria-controls="custom-tabs-three-privacy" aria-selected="false"> <i class="nav-icon fas fa-lock mr-1"></i>  Privacy Policy
                                                  </a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-cookie-tab" data-toggle="pill" href="#custom-tabs-three-cookie" role="tab" aria-controls="custom-tabs-three-cookie" aria-selected="false"> <i class="nav-icon fas fa-cookie mr-1"></i>  Cookie Popup Privacy Policy
                                                 </a>
                                              </li>
                                             
                                            
                                            </ul>
                                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-three-terms" role="tabpanel" aria-labelledby="custom-tabs-three-terms-tab">
                                              <div class=" form-group mt-3 ">
                                                
                                               
                                                  <textarea id="compose-textarea-1" class="form-control" >
                                                   <h6><strong> you sign-in with us, you are giving us your permission and consent to send you email and/or SMS text messages. By checking the Terms and Conditions box and by signing in you automatically confirm that you accept all terms in this agreement.</strong></h6>
                                                  <h6>SERVICE</h6>
                                                  <p class="text-sm">We provide a service that currently allows you to receive requests for feedback, company information, promotional information, company alerts, coupons, discounts and other notifications to your email address and/or cellular phone or device. You understand and agree that the Service is provided "AS-IS" and that we assume no responsibility for the timeliness, deletion, mis-delivery or failure to store any user communications or personalization settings.</p>
                                                <p class="text-sm">You are responsible for obtaining access to the Service and that access may involve third party fees (such as SMS text messages, Internet service provider or cellular airtime charges). You are responsible for those fees, including those fees associated with the display or delivery of each SMS text message sent to you by us. In addition, you must provide and are responsible for all equipment necessary to access the Service and receive the SMS text messages. We do not charge any fees for delivery of email or SMS. This is a free service provided by us. However, please check with your internet service provider and cellular carrier for any charges that may incur as a result from receiving email and SMS text messages that we deliver upon your opt-in and registration with our email and SMS services. You can cancel at any time. Just text "STOP" to [Phone]. After you send the SMS message "STOP" to us, we will send you an SMS message to confirm that you have been unsubscribed. After this, you will no longer receive SMS messages from us.</p> 
                                              <h6>YOUR REGISTRATION OBLIGATIONS</h6>
                                              <p class="text-sm">In consideration of your use of the Service, you agree to:</p> 
                                              
                                              <ol class="list-unstyled">
                                                <li>
                                                  <a href="" class="btn-link text-secondary">provide true, accurate, current and complete information about yourself as prompted by the Service's registration form (such information being the "Registration Data") and</a>
                                                </li>
                                                <li>
                                                  <a href="" class="btn-link text-secondary"> maintain and promptly update the Registration Data to keep it true, accurate, current and complete. If you provide any information that is untrue, inaccurate, not current or incomplete, or we have reasonable grounds to suspect that such information is untrue, inaccurate, not current or incomplete, we have the right to suspend or <span class="text-danger">terminate your account/profile and refuse any and all current or future use of the Service (or any portion thereof).</span></a>
                                                </li>
                                               
                                              </ol>
                                              <p class="text-sm m-0">[Agency]</p>
                                              <p class="text-sm m-0">[Address]</p>
                                              <p class="text-sm m-0">[Phone]</p>
                                              <p class="text-sm m-0">[Email]</p>
                                              </textarea>
                                                  </div>
                                              
                                             
                                           
                                             
                  
                                            
                                             
                                              </div>
                                              <!--Terms-End-->
                  
                                              <div class="tab-pane fade show " id="custom-tabs-three-privacy" role="tabpanel" aria-labelledby="custom-tabs-three-privacy-tab">
                                                <div class=" form-group mt-3 ">
                                                
                                               
                                                  <textarea id="compose-textarea-2" class="form-control" >
                                                   <h6 class="text-uppercase"><strong> PRIVACY</strong></h6>
                                                   <h6><strong> The information provided during this registration is kept private and confidential, and will never be distributed, copied, sold, traded or posted in any way, shape or form. This is our guarantee.</strong></h6>
                                                 <h6 class="text-uppercase">INDEMNITY</h6>
                                                   <p class="text-sm">You agree to indemnify and hold us,. and its subsidiaries, affiliates, officers, agents, co-branders or other partners, and employees, harmless from any claim or demand, including reasonable attorneys' fees, made by any third party due to or arising out of Content you receive, submit, reply, post, transmit or make available through the Service, your use of the Service, your connection to the Service, your violation of the TOS, or your violation of any rights of another.</p>
                                                   <h6 class="text-uppercase">DISCLAIMER OF WARRANTIES</h6>
                                                   <h6 class="text-uppercase">YOU EXPRESSLY UNDERSTAND AND AGREE THAT:</h6>
                                             
                                                   <ol>
                                                <li>YOUR USE OF THE SERVICE IS AT YOUR SOLE RISK. THE SERVICE IS PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS. ,. AND US, IT'S CUSTOMERS, EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT.</li>
                                                <li>MAKES NO WARRANTY THAT (i) THE SERVICE WILL MEET YOUR REQUIREMENTS, (ii) THE SERVICE WILL BE UNINTERRUPTED, TIMELY, SECURE, OR ERROR-FREE, (iii) THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THE SERVICE WILL BE ACCURATE OR RELIABLE, AND (iv) ANY ERRORS IN THE SOFTWARE WILL BE CORRECTED.</li>
                                             <li>ANY MATERIAL DOWNLOADED OR OTHERWISE OBTAINED THROUGH THE USE OF THE SERVICE IS DONE AT YOUR OWN DISCRETION AND RISK AND THAT YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM OR LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF ANY SUCH MATERIAL.</li>
                                            <li>NO ADVICE OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM OR THROUGH OR FROM THE SERVICE SHALL CREATE ANY WARRANTY NOT EXPRESSLY STATED IN THE TOS.</li> 
                                            </ol>
                                            <h6 class="text-uppercase">LIMITATION OF LIABILITY</h6>
                                            <p class="text-sm">YOU EXPRESSLY UNDERSTAND AND AGREE THAT AND SHALL NOT BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL OR EXEMPLARY DAMAGES, INCLUDING BUT NOT LIMITED TO, DAMAGES FOR LOSS OF PROFITS, GOODWILL, USE, DATA OR OTHER INTANGIBLE LOSSES (EVEN IF HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES), RESULTING FROM:</p>
                                             <ol>
                                               <li>
                                                THE USE OR THE INABILITY TO USE THE SERVICE;
                                               </li>
                                               <li>
                                                THE COST OF PROCUREMENT OF SUBSTITUTE GOODS AND SERVICES RESULTING FROM ANY GOODS, DATA, INFORMATION OR SERVICES PURCHASED OR OBTAINED OR MESSAGES RECEIVED OR TRANSACTIONS ENTERED INTO THROUGH OR FROM THE SERVICE;
                                               </li>
                                               <li>
                                                UNAUTHORIZED ACCESS TO OR ALTERATION OF YOUR TRANSMISSIONS OR DATA;
                                               </li>
                                               <li>
                                                STATEMENTS OR CONDUCT OF ANY THIRD PARTY ON THE SERVICE; OR
                                               </li>
                                               <li>
                                                ANY OTHER MATTER RELATING TO THE SERVICE.
                                               </li>
                                             </ol> 
                                            
                                             <p class="text-sm ">By registering and subscribing to our email and SMS service, by opt-in, online registration or by filling out a card, "you agree to these TERMS OF SERVICE" and you acknowledge and understand the above terms of service outlined and detailed for you today.</p>
                                             <p class="text-sm m-0">[Agency]</p>
                                             <p class="text-sm m-0">[Address]</p>
                                             <p class="text-sm m-0">[Phone]</p>
                                             <p class="text-sm m-0">[Email]</p>
                                            </textarea>
                                                  </div>
                                             
                                               
                                              </div><!--privacy-end-->
                                              <div class="tab-pane fade show " id="custom-tabs-three-cookie" role="tabpanel" aria-labelledby="custom-tabs-three-cookie-tab">
                                                <div class=" form-group mt-3 ">
                                                
                                               
                                                  <textarea id="compose-textarea-3" class="form-control" style="height: 300px; overflow-y: scroll;" >
                                                <h6>Last Revised May 25, 2018</h6>
                                                <h6 class="text-uppercase"><strong> PRIVACY POLICY</strong></h6>
                                                <h6>Introduction</h6>
                                                <p class="text-sm ">The creator of this website is the data controller and we are responsible for your personal data (referred to as "we", "us" or "our" in this notice) through your use of this Site.</p>
                                                <p class="text-sm ">For the purposes of our Policy, when we refer to "you" we mean any past, current or prospective customer, including a visitor to this Site.</p>
                                                 <p class="text-sm ">You grant us permissions outlined in this notice by clicking on "I agree" or by continuing use of this site after receiving this notification.</p>  
                                                 
                                                 <p class="text-sm ">If you need to contact us about this Policy, please refer to the business contact information found in the Terms linked at the bottom of the Site.</p> 
                                                 <p class="text-sm">If you need to contact us about this Policy, please refer to the business contact information found in the Terms linked at the bottom of the Site.</p>
                                                 <p class="text-sm">This Policy does not cover any other data collection or processing. In the future, the data that you (and potentially any customers) will be governed by a separate agreement.</p>
                                                 <p class="text-sm">By providing us with your data, you warrant to us that you are over 13 years of age.</p>
                                                 <h6>Data Collection.</h6>
                                                 <p class="text-sm ">We may collect from you the following data:</p>
                                                 <ul>
                                                   <li>First Name and Last Name</li>
                                                   <li>Email Address</li>
                                                   <li>Preferred Phone Number</li>
                                                   <li>Business Name</li>
                                                   <li>Postal Address</li>
                                                   <li>Marketing and Communication Preference</li>
                                                   <li>Technical Data including Cookies and Usage Data</li>
                                                 </ul>
                                                 <h6>Use of Data.</h6>
                                                 <p class="text-sm ">We may use your data to:</p>
                                                 <ul>
                                                   <li>Reply to your request for specific materials or resources,</li>
                                                   <li>Reply to inquiries about products or services,</li>
                                                   <li>Contact you with relevant information including newsletters,</li>
                                                   <li>Contact you marketing and/or promotional offers,</li>
                                                   <li>Contact you with other information that may be of interest to you,</li>
                                                   <li>Contact you with special offers,</li>
                                                   <li>Contact you to participate in relevant surveys,</li>
                                                   <li>Obtain feedback about the quality of service,</li>
                                                   <li>Effectively administer and protect the Site.</li>
                                                 </ul>
                                                 <h6>Grounds of Processing.</h6>
                                                 <p class="text-sm ">Under General Data Protection Data Regulations, we have lawful grounds of processing your personal data because of your consent or our legitimate interests in responding to:</p>
                                                 <ul>
                                                   <li>Your general inquiry,</li>
                                                   <li>Your inquiry about products or services,</li>
                                                   <li>Your request for specific materials or resources.</li>
                                                  
                                                 </ul>
                                                 <p class="text-sm ">We do not collect any Sensitive Data; including details about your race, ethnicity, religious or philosophical beliefs, sexual orientation, political beliefs, health, criminal history.</p>
                                               <p class="text-sm ">Our lawful ground of processing your personal data to send you marketing communications is either your consent or our legitimate interest.</p>
                                              <h6>Data Collection.</h6>  
                                              <p class="text-sm ">We primarily collect your data by the data you provide to us (Example - Providing Name and Email on this Site or sending an email to the business details found in the Terms). By using our Site, we may automatically collect certain data by using cookies and similar technologies.</p>
                                              <p class="text-sm ">We may use third parties located outside the EU such as Google search, Facebook advertising network, providers of technical services and fraud detection agencies.Marketing Communication.</p>
                                              <h6>Communication.</h6>
                                              <p class="text-sm ">Under the Privacy and Electronic Communications Regulations, we may only send you email or text marketing communications if you made a purchase or asked for information from us without having opted out. If you are a limited company, we may still email you without consent. However, you can opt out at any time.</p> 
                                              <p class="text-sm ">To unsubscribe or opt out of any communication, please contact us using the business details in the Terms at the bottom of this Site.</p>
                                              <h6>Disclosures.</h6>
                                              <p class="text-sm ">Personal data may have to be shared with the following parties:</p>
                                              <ul>
                                                <li>Administrative service providers.</li>
                                                <li>Technical service providers.</li>
                                                <li>Professional service providers including lawyers & accountants.</li>
                                                <li>Government bodies.</li>
                                                <li>Third parties that may acquire or transfer parts or entirety of our business assets.</li>
                                              
                                              </ul>
                                              <p class="text-sm ">All parties with whom we disclose personal data to will be required to adhere to the law.</p>
                                              <h6>International Transfer.</h6>
                                              <p class="text-sm ">We may share your personal data with companies outside of the European Economic Area (EAA).</p>
                                              <p class="text-sm ">As such, we are subject to the General Data Protection Regulations (GDPR) that protect your personal data. We will ensure the proper safeguards are in place whenever your personal data is transferred outside the EAA.</p>
                                              <h6>Security</h6>
                                              <p class="text-sm ">Reasonable security measures have been put in place to prevent loss, alteration, accidental disclosures. Only employees and authorized partners will have access to your personal data in order to process it as instructed. All your personal data is expected to be kept confidential.</p>
                                            <p class="text-sm ">If a data breach occurs, we have procedures in place that includes notifying you and any regulation body if we are legally required to.</p>
                                          <h6>Cookies.</h6>  
                                          <p class="text-sm ">As a data subject, you may set any browser to refuse all cookies or notify you of a cookie sent. If you do not accept any cookies, you may experience issues with this Site.</p>
                                          <h6>Information Storage.</h6>
                                          <p class="text-sm ">We will retain your personal data for the length of time required for the purpose it was collected. As we process your personal data, we ensure it will be treated in accordance with this Privacy Notice.</p>
                                          <h6>Links to Other Sites.</h6>
                                          <p class="text-sm ">Our Site may contain links to other sites that are not operated by us. If you click on a third-party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit. We have no control over and assume no responsibility for the content, privacy policies or practices of any third-party sites or services.</p>
                                          <h6>Your Rights.</h6>
                                          <p class="text-sm ">If you are a resident of the EEA, you have certain personal data protection rights regarding the right to request access, correction, deletion, restriction, transfer, object to processing data, data portability and (where lawful) withdraw consent.</p>
                                          <p class="text-sm ">Please contact the business information in the Terms to make any of the above requests. Note, we may ask you to verify your identify before acting on any request.</p>
                                          <p class="text-sm ">If you are dissatisfied with how we collect and process your data, we ask that you please contact us first so we can do our best to resolve. However, you have the right to complain to the Information Commission's Office (ICO) or your local data protection authority.</p>
                                          <p class="text-sm m-0">[Agency]</p>
                                          <p class="text-sm m-0">[Address]</p>
                                          <p class="text-sm m-0">[Phone]</p>
                                          <p class="text-sm m-0">[Email]</p>
                                          </textarea>
                                          </div>
                                            </div><!--cookie-end-->
                                             
                                   </div><!--card-body-->
                                   <div class="card-footer clearfix">
                                    <button type="button" class="btn orange-button float-right"><i class="fas fa-check mr-2"></i> Save </button>
                                  </div>
                                   
                                  </div><!--card-->
                                  </div><!--column-8-->
                                    
                                    </div><!--row-->
                                 
                                
                               
                               
                              </div>
                                   </div>
                                   
                                  </div><!--Tos Set-Up-->
                                </div>
                              </div>
                            </div><!--row-->
                         
  
                          </div>
                          <!--Preview-end-->
                        </div>
                      </div>
                      <!-- /.card -->
                  
                  
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
              <!-- /.card-body -->
                    
            
           
{{--            
            <div class="card-footer clearfix">
              <button type="button" class="btn btn-primary float-right"> Next Step <i class="fas fa-chevron-right ml-2"></i></button>
            </div>
         --}}
         
          </section>
          <!-- /.Left col -->
  
          
         
        </div>
        <!-- /.row (main row) -->
  
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>


<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="../../plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../../plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../../plugins/flot-old/jquery.flot.pie.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(function () {

    //Timepicker
    $('#timepicker1').datetimepicker({
      format: 'LT'
    })

    $('#timepicker2').datetimepicker({
      format: 'LT'
    })

    $('#timepicker3').datetimepicker({
      format: 'LT'
    })

    $('#timepicker4').datetimepicker({
      format: 'LT'
    })

//TOS Set up
    $('#compose-textarea-1').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }
  });
  $('#compose-textarea-2').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }
  });
  $('#compose-textarea-3').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }
  });

//Colorpicker
$('.my-colorpicker1').colorpicker()
    //Money Euro
$('[data-mask]').inputmask()

   //Initialize Select2 Elements
   $('.select2').select2()
  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
    var optionValues =[];
    $(".select2bs4 option").each(function(){
    if($.inArray(this.value, optionValues) >-1){
        $(this).remove()
    }else{
        optionValues.push(this.value);
    }
    });
  //Date range picker
  $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

     
    

    
  });


  
 

    

</script>
@endsection