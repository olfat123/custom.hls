<template>
    <div>
        <div class="page-header">
            <div class="page-title">
                <h3>New Users</h3>
            </div>
            <div>
                <a id="btnSearch" href="#ModalNewUserAcademy" class="btn bg-orange text-white" data-toggle="modal" data-placement="top">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                    </path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line>
                    <line x1="23" y1="11" x2="17" y2="11"></line>
                </svg>
                </a>
            </div>
        </div>

        <div class="row layout-spacing">

            <!-- Content -->
            <!--div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
                <div class="user-profile layout-spacing">
                    <div class="widget-content widget-content-area">
                        <div class="d-flex justify-content-between"> 
                        </div>
                        <div class="user-info-list">
                            <div class="">
                                <ul class="contacts-block list-unstyled">
                                </ul>
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div-->

            <div class="col-xl-12 col-lg-6 col-md-7 col-sm-12">
                <div id="content main-content">
                    <div class="layout-px-spacing">
                        <div class="row layout-top-spacing" id="cancel-row">
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                    <div class="table-responsive mb-4 mt-4">
                                        <table id="zero-config" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Lastname</th>
                                                    <th>Telephone</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>actions</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody v-for="DATA in ALL_USERS_ACADEMY" :key="DATA.USERID">
                                            
                                                <tr>
                                                    <td>{{DATA.FIRST_NAME}} </td>
                                                    <td>{{DATA.SECOND_NAME}}</td>
                                                    <td>{{DATA.PHONE}}</td>
                                                    <td>{{DATA.email}}</td>
                                                    <td>{{DATA.STATUS_NAME}}</td>
                                                    <td>
                                                        <a href="#updateUserAcademyModal"  data-toggle="modal" data-placement="top"  title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" v-on:click="editUserAcademy(DATA)" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="#updateCredentialsUserAcademyModal" data-toggle="modal" data-placement="top" title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" v-on:click="editUserPassword(DATA)" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11"
                                                            width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                                        </a>
                                                        <a href="#deleteUserAcademyModal" data-toggle="modal" data-placement="top" title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" v-on:click="editUserDelete(DATA)" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Lastname</th>
                                                    <th>Telephone</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- CREATE NEW USER ACADEMY --->
        <div class="modal fade" id="ModalNewUserAcademy" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal">
                        <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        <div class="compose-box">
                            <div class="compose-content">
                                <h5 class="task-heading">User Academy</h5>
                            </div>
                        </div>
                        <form class="simple-example" action="javascript:void(0);" novalidate>
                            <div class="form-row">
                                <div class="col-md-12 mb-4">
                                    <div id="messageName"></div>
                                    <label for="fullName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" v-model="FIRST_NAME" placeholder="" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please fill the name
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div id="messageLast"></div>
                                    <label for="fullName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" v-model="SECOND_NAME" placeholder="" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please fill the lastname
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="fullName">Telephone</label>
                                    <input type="text" class="form-control" id="phone" v-model="PHONE" placeholder="" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please fill the Phone
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div id="messageEmail"></div>
                                    <label for="fullName">Email</label>
                                    <input type="text" class="form-control" id="email" v-model="EMAIL" placeholder="" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please fill the email
                                    </div>
                                </div>
                                <div id="messagePassword"></div>
                            
                                <div class="col-md-12 mb-4">
                                    <label for="fullName">Password</label>
                                    <input type="password" class="form-control" id="password" v-model="PASSWORD" placeholder="" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please fill the name
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="fullName">Confirm Password</label>
                                    <input type="password" class="form-control" id="cpassword" v-model="C_PASSWORD" placeholder="" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please fill the name
                                    </div>
                                </div>
                            </div>
                        </form>
                                    
                    </div>
                    <div class="modal-footer">
                        <!--button class="btn btn-secondary"  data-dismiss="modal"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg> No
                        </button-->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#userAcademyModal" >Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONFIRM NEW USER ACADEMY --->
        <div class="modal fade" id="userAcademyModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        <div class="compose-box">
                            <div class="compose-content">
                                <h5 class="task-heading">New User Academy</h5>
                                <p class="task-text">Do you want to add new user for you Academy?</p>
                            </div>
                        </div>
                        <div id="messageSuggested"></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary"  data-dismiss="modal"> 
                            <!--svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg--> No
                        </button>

                        <button class="btn btn-secondary" v-on:click="newUserAcademy()" data-dismiss="modal"> 
                            <!--svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg--> Yes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- DELETE USER ACADEMY --->
        <div class="modal fade" id="deleteUserAcademyModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        <div class="compose-box">
                            <div class="compose-content">
                                <h5 class="task-heading">Remove</h5>
                                <p class="task-text">Do you want to remove this user?</p>
                            </div>
                        </div>

                        <div id="messageSuggested"></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary"  data-dismiss="modal"> 
                            <!--svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg--> No
                        </button>

                        <button class="btn btn-secondary" v-on:click="deleteUserAcademy()" data-dismiss="modal"> 
                            <!--svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg--> Yes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- UPDATE USER ACADEMY --->
        <div class="modal fade" id="updateUserAcademyModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        <div class="compose-box">
                            <div class="compose-content">
                                <h5 class="task-heading">Update User Academy</h5>

                                <form class="needs-validation" novalidate action="javascript:void(0);">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-4">
                                            <label for="validationCustom01">First name</label>
                                            <input type="text" class="form-control" id="validationCustom01" v-model="FIRST_NAME" placeholder="First name" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="validationCustom02">Last name</label>
                                            <input type="text" class="form-control" id="validationCustom02" v-model="SECOND_NAME" placeholder="Last name" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="validationCustomUsername">Telephone</label>

                                            <input type="text" class="form-control" id="validationCustomUsername" v-model="PHONE" placeholder="Telephone number" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please Enter a telephone number!
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label for="validationCustom02">Email</label>
                                            <input type="text" class="form-control" id="validationCustom03" v-model="EMAIL" placeholder="Email" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-4">
                                            <label for="validationCustom04">Status</label>
                                            <!--input type="text" class="form-control" id="validationCustom04" placeholder="State" required-->
                                            <select class="form-control  basic" name="category_id" @change="onChange($event)">
                                                <option value="1">Active</option>
                                                <option  selected="selected"  value="2">Inactive</option>
                                                
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>

                                        <!--div class="col-md-12 mb-4">
                                            <label for="validationCustom03">Username</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="user@user.com" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Username.
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="validationCustom03">New Password</label>
                                            <input type="password" class="form-control" id="validationCustom03" placeholder="password" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Password.
                                            </div>
                                        </div-->
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary"  data-dismiss="modal"> 
                            <!--svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg--> No
                        </button>

                        <button class="btn btn-primary" v-on:click="updateUserAcademy()" data-dismiss="modal"> 
                            <!--svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg--> Yes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- UPDATE USER ACADEMY CREDENTIALS --->
        <div class="modal fade" id="updateCredentialsUserAcademyModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        <div class="compose-box">
                            <div class="compose-content">
                                <h5 class="task-heading">Update Credentials User Academy</h5>

                                <form class="needs-validation" novalidate action="javascript:void(0);">
                                    
                                    <div class="form-row">
                                        <div class="col-md-12 mb-4">
                                            <label for="validationCustom03">Username</label>
                                            <input type="text" class="form-control" v-model="EMAIL" id="validationCustom10" placeholder="user@user.com" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Username.
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="validationCustom03">New Password</label>
                                            <input type="password" class="form-control" v-model="PASSWORD" id="validationCustom11" placeholder="password" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Password.
                                            </div>
                                        </div>
                                    </div>
                                </form>  
                            </div>
                        </div>
                        <div id="messageCredentials"></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary"  data-dismiss="modal"> 
                            <!--svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg--> No
                        </button>

                        <button class="btn btn-primary" v-on:click="updatePasswordUsersAcademy()" data-dismiss="modal"> 
                            <!--svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg--> Yes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</template>
<script>

    import Api from '../apis/Apis.json';
    export default {
        data() {
            return {
                USERID: "",  /*Este userid es del padre y/o Academia*/ 
                USERID_F: "", //USERID_FATHER
                USERID_S: "", //USERID_SON
                PRICECATALOGID: 1,
                USERGROUPID: "",
                STATUSID: 2,
                FIRST_NAME: "",
                SECOND_NAME: "",
                PHONE: "",
                EMAIL: "",
                PASSWORD: "",
                C_PASSWORD: "",
                ALL_USERS_ACADEMY: [],
                Message: false,
                //Variables de Entorno:
                apiUrl   : process.env.MIX_API_URL,
                app_key  : process.env.MIX_APP_KEY,

            };
        },
        created:function(){
            
        },
        mounted: function(){

            setTimeout(() => {
                this.getAllUserAcademy();
    
            },1000)
    
        }, 
        methods: {
            //para recuperar el valor seleccionado en Select
            onChange(event) {

                this.STATUSID = event.target.value;
            },

            newUserAcademy(){

                // this.cleanFormAcademyUsers();

                let axiosConfig = {
                    headers: {
                        "Content-Type": "application/json"
                    }
                };    

                var url = this.apiUrl;
                var method = Api.Academy.v3;
                var endPoint = url + method;   
                var Data = {
                    APP_KEY : this.app_key,
                    infoData :{ 
                        
                        USERID_F: document.getElementById("USERID").value,
                        USERGROUPID: 3,//document.getElementById("USERGROUPID").value,
                        STATUSID: this.STATUSID,
                        PRICECATALOGID: this.PRICECATALOGID,
                        FIRST_NAME: this.FIRST_NAME,
                        SECOND_NAME: this.SECOND_NAME,
                        PHONE: this.PHONE,
                        email: this.EMAIL,
                        password: this.PASSWORD

                    }        
                };

                if(this.FIRST_NAME == ""){
                        
                        document.getElementById("messageName").innerHTML = "<div class='alert alert-warning' role='alert'>Enter a name...</div>";

                    if(this.SECOND_NAME == ""){
                        
                        document.getElementById("messageLast").innerHTML = "<div class='alert alert-warning' role='alert'>Enter a lastname...</div>";
    
                    }
                }

                if(this.EMAIL == ""){
                    
                            document.getElementById("messageEmail").innerHTML = "<div class='alert alert-warning' role='alert'>Email field cannot be empty...</div>";

                
                }else if(this.validateEmail(this.EMAIL) === true){
                    
                    document.getElementById("messageEmail").innerHTML = "<div class='alert alert-warning' role='alert'>Enter a email correctly...</div>";

                
                }

                if(this.PASSWORD == "" && this.C_PASSWORD == ""){
                    
                    document.getElementById("messagePassword").innerHTML = "<div class='alert alert-warning' role='alert'>Password fields cannot be empty...  </div>";

                    
                }else if(this.PASSWORD.length >= 8 && this.C_PASSWORD.length >= 8){
                    
                    if(this.PASSWORD !== this.C_PASSWORD){
                        
                            document.getElementById("messagePassword").innerHTML = "<div class='alert alert-warning' role='alert'>Passwords fields are different, please keep them the same...  </div>";

                    }else{
                        axios.post(endPoint, JSON.stringify(Data))
                
                        .then(response => {     
                            
                            this.cleanFormAcademyUsers();
                            this.getAllUserAcademy();

                            console.log("ANSWER-API" + response.data);

                        }).catch(error => {        
                                console.log(error.message);
                            }
                        );
                    }

                }else{
                        
                    document.getElementById("messagePassword").innerHTML = "<div class='alert alert-warning' role='alert'>Passwords fields must have a minimum of 8 characters...  </div>";
                }

            },

            getAllUserAcademy(){

                let axiosConfig = {
                    headers: {
                        "Content-Type": "application/json"
                    }
                };               
                var url = this.apiUrl;
                var method = Api.Academy.v4;
                var endPoint = url + method;   
                var Data = {
                    APP_KEY : this.app_key,
                    infoData :{ 
                        
                        USERID_F: document.getElementById("USERID").value,
                    
                    }       
                        
                };

                axios.post(endPoint, JSON.stringify(Data))
                
                .then(response => {     
                    
                    this.ALL_USERS_ACADEMY = response.data

                    console.log("ANSWER-API" + response.data);

                }).catch(error => {        
                        console.log(error.message);
                    }
                );

            },

            cleanFormAcademyUsers(){

                this.FIRST_NAME = "",
                this.SECOND_NAME = "",
                this.PHONE = "",
                this.EMAIL = "",
                this.PASSWORD = "",
                this.C_PASSWORD = ""

            },

            validateEmail(email){

                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(email)){

                    return true;

                } else {

                    return false;
                }

            },

            editUserAcademy(DATA){

                this.USERID_S = DATA.USERID
                this.FIRST_NAME = DATA.FIRST_NAME,
                this.SECOND_NAME = DATA.SECOND_NAME,
                this.PHONE = DATA.PHONE,
                this.EMAIL = DATA.email
            
            },

            updateUserAcademy(){

                let axiosConfig = {
                    headers: {
                        "Content-Type": "application/json"
                    }
                };   

                var url = this.apiUrl;
                var method = Api.Academy.v5;;
                var endPoint = url + method;  

                var Data = {
                    APP_KEY : this.app_key,
                    infoData :{ 
                        
                        USERID: this.USERID_S,
                        STATUSID: this.STATUSID,
                        FIRST_NAME: this.FIRST_NAME,
                        SECOND_NAME: this.SECOND_NAME,
                        PHONE: this.PHONE,
                        email: this.EMAIL
                    }           
                };

                axios.post(endPoint, JSON.stringify(Data))
                
                .then(response => {     
                    
                
                    this.getAllUserAcademy();
                    console.log("ANSWER-API" + response.data);

                }).catch(error => {        
                        console.log(error.message);
                    }
                );

            },

            editUserPassword(DATA){

                this.USERID_S = DATA.USERID,
                this.EMAIL = DATA.email
                //this.PASSWORD = DATA.password
            
            },

            updatePasswordUsersAcademy(){

                let axiosConfig = {
                    headers: {
                        "Content-Type": "application/json"
                    }
                };   

                var url = this.apiUrl;
                var method = Api.Academy.v6;
                var endPoint = url + method;  

                var Data = {
                    APP_KEY : this.app_key,
                    infoData :{ 
                        
                        USERID: this.USERID_S,
                        password: this.PASSWORD,
                    
                    }       
                        
                };

                axios.post(endPoint, JSON.stringify(Data))
                
                .then(response => {     
                    
                    this.getAllUserAcademy();
                    console.log("ANSWER-API" + response.data);

                }).catch(error => {        
                        console.log(error.message);
                    }
                );

            },

            editUserDelete(DATA){

                this.USERID_S = DATA.USERID

            },

            deleteUserAcademy(){

                let axiosConfig = {
                    headers: {
                        "Content-Type": "application/json"
                    }
                };   

                var url = this.apiUrl;
                var method = Api.Academy.v7;
                var endPoint = url + method;  

                var Data = {
                    APP_KEY : this.app_key,
                    infoData :{ 
                        
                        USERID: this.USERID_S,
                        STATUSID: '3',
                    
                    }       
                        
                };

                axios.post(endPoint, JSON.stringify(Data))
                
                .then(response => {     
                    
                
                    this.getAllUserAcademy();
                    console.log("ANSWER-API" + response.data);

                }).catch(error => {        
                        console.log(error.message);
                    }
                );
            },

        }  
    }
</script>