<template>
    <!--  BEGIN CONTENT AREA  -->
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Glossary</h3>
            </div>
        </div>
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="mail-box-container">
                    <div class="mail-overlay"></div>

                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                </svg>
                                <h5 class="app-title">Terms</h5>
                            </div>

                            <div class="todoList-sidebar-scroll">
                                <div class="col-md-12 col-sm-12 col-12 mt-4 pl-0">
                                    <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link list-actions active" id="all-list" data-toggle="pill" 
                                            href="#pills-inbox" role="tab" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" 
                                            y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line>
                                            <line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line>
                                            <line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg> Bank <span class="todo-badge badge"></span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="todo-task-important" data-toggle="pill" href="#pills-important" 
                                            role="tab" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                                            stroke-linejoin="round" class="feather feather-star">
                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                            </svg> Favorites <span class="todo-badge badge"></span></a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="todo-inbox" class="accordion todo-inbox">
                        <div class="search">
                            <input type="text" class="form-control" v-model="SEARCHED_WORD" v-on:keyup.enter="SearchWord()" placeholder="Enter word, acronym or phrase">
                            <!--input type="text" class="form-control" data-toggle="tooltip" data-placement="top" title="Case Sensitive" v-model="SEARCHED_WORD" v-on:keyup.enter="SearchWord()" placeholder="Enter word, acronym or phrase"-->

                            <a id="btnSearch" class="btn bg-orange text-white" v-on:click="SearchWord()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </a>
                        </div>
                        <div class="todo-box">
                            <div id="ct" class="todo-box-scroll">
                                
                                <div v-for="DATA in ARRAY_WORDS" :key="DATA.WORDID" class="todo-item all-list">
                                    <div class="todo-item-inner">
                                        <div class="n-chk text-center">
                                            <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" class="new-control-input inbox-chkbox">
                                            <span class="new-control-indicator"></span>
                                            </label>
                                        </div>

                                        <div class="todo-content">
                                            <h5 class="todo-heading" data-todoHeading="">{{DATA.WORD_SENTENCE}}</h5>
                                            <ul>
                                                <li> 
                                                    <p class="todo-heading" style="color:#2276DA" >{{DATA.DESCRIPTION}}</p> 
                                                    <p class="todo-heading" style="color:#278e5f" >{{DATA.CONTEXT}} </p> 
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="priority-dropdown custom-dropdown-icon">
                                            <div class="dropdown p-dropdown">
                                                <a class="dropdown-toggle warning"  v-on:click="confirmAddFavorite(DATA)" href="#" role="button" id="dropdownMenuLink-1" data-toggle="modal" data-target="#favoriteModal"  aria-haspopup="true" aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-1">
                                                    <a class="dropdown-item danger" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> High</a>
                                                    <a class="dropdown-item warning" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> Middle</a>
                                                    <a class="dropdown-item primary" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> Low</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <div v-for="DATA in ARRAY_WORDS_FAVORITES" :key="DATA.WORDID" class="todo-item todo-task-important">
                                    <div class="todo-item-inner">
                                        <div class="n-chk text-center">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" class="new-control-input inbox-chkbox">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </div>

                                        <div class="todo-content">
                                            <h5 class="todo-heading" data-todoHeading="">{{DATA.WORD_SENTENCE}}</h5>
                                            <ul>
                                                <li>
                                                    <p class="todo-heading" style="color:#f15e22">{{DATA.DESCRIPTION}}</p>
                                                    <p class="todo-heading" style="color:#278e5f" >{{DATA.CONTEXT}} </p> 
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="priority-dropdown custom-dropdown-icon">
                                            <div class="dropdown p-dropdown">
                                                <a class="dropdown-toggle primary" v-on:click="confirmDeleteFavorite(DATA)" href="#" role="button" id="dropdownMenuLink-8" data-toggle="modal" data-target="#deleteFavoriteModal" aria-haspopup="true" aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-8">
                                                    <a class="dropdown-item danger" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> High</a>
                                                    <a class="dropdown-item warning" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> Middle</a>
                                                    <a class="dropdown-item primary" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> Low</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ADD TO FAVORITES --->
                            <div class="modal fade" id="favoriteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                                class="feather feather-x close" data-dismiss="modal">
                                                <line x1="18" y1="6" x2="6" y2="18"> </line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                            <div class="compose-box">
                                                <div class="compose-content">
                                                    <h5 class="task-heading">Favorites</h5>
                                                    <p class="task-text">Would you like to add to favorites?</p>
                                                </div>
                                            </div>
                                            <div id="messageFavorite"></div>
                                        
                                        </div>
                                        <div class="modal-footer">

                                            <button class="btn btn-secondary" v-on:click="AddToFavorite()"> 
                                                <!--svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                </svg--> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- DELETE FROM FAVORITES --->
                            <div class="modal fade" id="deleteFavoriteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            <div class="compose-box">
                                                <div class="compose-content">
                                                    <h5 class="task-heading">Favorites</h5>
                                                    <p class="task-text">Would you like to remove this word from favorites?</p>
                                                </div>
                                            </div>
                                            <div id="messageDelete"></div>
                                        </div>
                                        <div class="modal-footer">

                                            <button class="btn btn-secondary" v-on:click="deleteFavoriteWord()" data-dismiss="modal"> 
                                                <!--svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                </svg--> Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                    
                </div>

                <!-- SUGGESTED WORDS --->
                <div class="modal fade" id="suggestionModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                <div class="compose-box">
                                    <div class="compose-content">
                                        <h5 class="task-heading">Favorites</h5>
                                        <p class="task-text">This word is not in the glossary, would you like to suggest this word to be added?</p>
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

                                <button class="btn btn-secondary" v-on:click=" addSuggestedWord()" data-dismiss="modal"> 
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
        </div>
    </div>
<!--  END CONTENT AREA  -->

</template>

<script>

    import Api from '../apis/Apis.json';
    
    export default {

        data() {
            return {
                USERID: 0,
                WORDID: 0,
                WORDSTATUSID: 0,
                STATUSID: 0,
                WORD_SENTENCE: "",
                DESCRIPTION: "",
                ARRAY_WORDS: [],
                ARRAY_WORDS_FAVORITES: [],
                SEARCHED_WORD: "",
                STATUS_RESPONSE: "",
                FAVORITEID: "",
                TYPEID: 1,                     
                TIPSTATUSID: 1,
                STATUSID: 1,
                WORD: "",
                //Variables de Entorno:
                apiUrl  : process.env.MIX_API_URL,
                app_key : process.env.MIX_APP_KEY,

            };
        },
        created:function(){
        
        },
        mounted: function () {
            
            setTimeout(() => {

                this.allFavoriteWordByUser();
                        
            },500)

        },
    
        methods: {
            SearchWord(DATA){

                let axiosConfig = {
                    headers: {
                        "Content-Type": "application/json"
                    }
                };               
                var url = this.apiUrl;
                var method = Api.Word.v7;
                var endPoint = url + method;   
                var Data = {
                    APP_KEY : this.app_key,
                    infoData :{ 
                        SEARCHEAD_WORD: this.SEARCHED_WORD,        
                    }       
                        
                };

                if(this.SEARCHED_WORD.length > 0 ){

                    axios.post(endPoint, JSON.stringify(Data))
                
                    .then(response => {     
                        
                            this.ARRAY_WORDS = response.data

                            if(this.ARRAY_WORDS.length < 1){

                                $('#suggestionModal').modal('show');

                                //alert('Desplegar Modal Suggestion');
                            }

                            console.log("ARRAY_WORDS" + response.data);

                    }).catch(error => {        
                            console.log(error.message);
                        }
                    );

                }else{

                    document.getElementById("infoToSearch").innerHTML = "<div class='alert alert-warning' role='alert'>Enter a word to search.....</div>";

                    setTimeout(() => {

                        document.getElementById("infoToSearch").style.display = 'none';
                        
                    },3000);
            
                }
            },

            AddToFavorite(){

                let axiosConfig = {
                    headers: {
                        "Content-Type": "application/json"
                    }
                };               
                var url = this.apiUrl;
                var method = Api.Word.v8;
                var endPoint = url + method;   
                var Data = {
                    APP_KEY : this.app_key,
                    infoData :{ 
                        USERID: document.getElementById("USERID").value,
                        WORDID: this.WORDID       
                    }       
                        
                };

                axios.post(endPoint, JSON.stringify(Data))
                
                .then(response => {                     
                
                        this.STATUS_RESPONSE = response.data

                        if(this.STATUS_RESPONSE === true){

                            document.getElementById("messageFavorite").innerHTML = "<div class='alert alert-success' role='alert'>Added To Favorites successfully </div>";
                            
                            this.allFavoriteWordByUser();

                            setTimeout(() => {

                                document.getElementById("messageFavorite").style.display = 'none';
                                //$("#favoriteModal").modal().hide();
                                
                            },3000);
                        }
                        /*if(this.STATUS_RESPONSE == true){

                            $('#favoriteModal').modal('close'); 

                        }*/
                    // this.allFavoriteWordByUser();

                        console.log("STATUS_RESPONSE" + response.data); 

                }).catch(error => {        
                        console.log(error.message);
                    }
                );

            },

            confirmAddFavorite(DATA){

                this.WORDID = DATA.WORDID

            },

            allFavoriteWordByUser(){

                let axiosConfig = {
                    headers: {
                        "Content-Type": "application/json"
                    }
                };               
                var url = this.apiUrl;
                var method = Api.Word.v9;
                var endPoint = url + method;   
                var Data = {
                    
                    APP_KEY : this.app_key,
                    infoData :{ 
                        USERID: document.getElementById("USERID").value,     
                    }       
                        
                };

                axios.post(endPoint, JSON.stringify(Data))
                
                .then(response => {                     
                
                        this.ARRAY_WORDS_FAVORITES = response.data

                        console.log("STATUS_RESPONSE" + response.data); 

                }).catch(error => {    

                        console.log(error.message);
                    }
                );
                
            },

            confirmDeleteFavorite(DATA){

                this.FAVORITEID = DATA.FAVORITEID

            },

            deleteFavoriteWord(){

                let axiosConfig = {
                    headers: {
                        "Content-Type": "application/json"
                    }
                };               
                var url = this.apiUrl;
                var method = Api.Word.v10;
                var endPoint = url + method;   
                var Data = {

                    APP_KEY : this.app_key,
                    infoData :{ 
                        FAVORITEID: this.FAVORITEID,     
                    }       
                        
                };

                axios.post(endPoint, JSON.stringify(Data))
                
                .then(response => {                     
                
                        this.STATUS_RESPONSE = response.data

                        this.allFavoriteWordByUser();

                        console.log("STATUS_RESPONSE" + response.data); 

                }).catch(error => {        
                        console.log(error.message);
                    }
                );

            },

            updateSuggestedWord(DATA){

                this.SUGGESTED_WORD = DATA.SUGGESTED_WORD;
            },
            
            addSuggestedWord(){

                let axiosConfig = {
                    headers: {
                        "Content-Type": "application/json"
                    }
                };               
                var url = this.apiUrl;
                var method = Api.Word.v11;
                var endPoint = url + method;   
                var Data = {

                    APP_KEY : this.app_key,
                    infoData :{ 
                        TYPEID: 1,                     
                        USERID: document.getElementById("USERID").value,
                        TIPSTATUSID: 1,
                        STATUSID: 1,
                        WORD: this.SEARCHED_WORD
        
                    }       
                        
                };

                axios.post(endPoint, JSON.stringify(Data))
                
                .then(response => {                     
                
                        this.STATUS_RESPONSE = response.data

                    
                        console.log("STATUS_RESPONSE" + response.data); 

                }).catch(error => {        
                        console.log(error.message);
                    }
                );
            } 
        }  
    };
</script>                                             