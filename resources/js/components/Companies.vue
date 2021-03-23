<template>
    <div class="row justify-content-center">
      <div class="col-12">
        <!-- Header -->
        <div class="header">
          <div class="header-body">
            <div class="row align-items-center">
              <div class="col">
                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  Overview
                </h6>
                <!-- Title -->
                <h1 class="header-title text-truncate">
                  Companies
                </h1>
              </div>
              <div class="col-auto">
                <!-- Buttons -->
                <a data-toggle="modal" data-target="#CompanyModal" href="#!" class="btn btn-primary ml-2">
                  Add company
                </a>
                <div class="modal fade" id="CompanyModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-card card" data-list="{&quot;valueNames&quot;: [&quot;name&quot;]}">
                                <div class="card-header">
                                    <!-- Title -->
                                    <h4 class="card-header-title" id="exampleModalCenterTitle">
                                        Add a company
                                    </h4>
                                    <!-- Close -->
                                    <button type="button" id="companymodalclose" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="post" @submit.prevent="onSubmit" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">Name<span style="color:red">*</span></label>
                                            <div :class="{'has-error': errors.name}">
                                                <input type="text" class="form-control" v-model="name" id="name" placeholder="Enter Name">
                                                <span v-if="errors.name" class="help-block text-danger">{{ errors.name[0] }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <div :class="{'has-error': errors.email}">
                                                <input type="email" v-model="email" class="form-control" id="email" placeholder="Enter email">
                                                <span v-if="errors.email" class="help-block text-danger">{{ errors.email[0] }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <div :class="{'has-error': errors.logo}">
                                                <input type="file" @change="processFile($event)" ref="logo" accept="image/x-png, image/jpeg" class="form-control" id="logo" placeholder="Upload Logo">
                                                <span v-if="errors.logo" class="help-block text-danger">{{ errors.logo[0] }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <div :class="{'has-error': errors.website}">
                                                <input type="text" v-model="website" class="form-control" id="website" placeholder="Enter Website">
                                                <span v-if="errors.website" class="help-block text-danger">{{ errors.website[0] }}</span>
                                            </div>
                                        </div>
                                        <button type="submit" style="float: right;" class="btn btn-primary ml-2">
                                            Add
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="alert alert-success" v-if="saved">
            <strong>Success!</strong> Company has been saved successfully.
        </div>
        <div class="alert alert-success" v-if="edited">
            <strong>Success!</strong> Company has been edited successfully.
        </div>

        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="companiesListPane" role="tabpanel" aria-labelledby="companiesListTab">
            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["item-name", "item-industry", "item-location", "item-owner", "item-created"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="companiesList">
              
              <div class="table-responsive">
                <table class="table table-sm table-hover table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-id" href="#">ID</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-name" href="#">Name</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-industry" href="#">Email</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-location" href="#">Website</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="list font-size-base">
                    <tr v-for="company in companies" :key="company.id">
                      <td>
                        <a class="item-name text-reset" href="">{{ company.id}}</a>
                      </td>
                      <td>
                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" :src="company.logo" :alt="company.name" />
                        </div>
                        <a class="item-name text-reset" href="">{{ company.name }}</a>
                      </td>
                      <td>
                        <!-- Text -->
                        <span class="item-industry">{{ company.email }}</span>
                      </td>
                      <td>
                        <!-- Text -->
                        <span class="item-location">{{ company.website }}</span>
                      </td>
                      <td>
                        <a href="" @click.prevent="editModal(company, company.id)"><span class="fe fe-edit mr-4"></span></a>  
                        <a href="" @click.prevent="del(company.id)"><span class="fe fe-trash-2 mr-4"></span></a>
                      </td>
                      <div class="modal fade" id="CompanyEdit" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-card card" data-list="{&quot;valueNames&quot;: [&quot;name&quot;]}">
                                    <div class="card-header">
                                        <!-- Title -->
                                        <h4 class="card-header-title" id="exampleModalCenterTitle">
                                            Edit company
                                        </h4>
                                        <!-- Close -->
                                        <button type="button" id="editmodalclose" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" @submit.prevent="onUpdate(company.id)" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="name">Name<span style="color:red">*</span></label>
                                                <div :class="{'has-error': editerrors.name}">
                                                    <input type="text" class="form-control" v-model="company.name" id="name" placeholder="Enter Name">
                                                    <span v-if="editerrors.name" class="help-block text-danger">{{ editerrors.name[0] }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Email</label>
                                                <div :class="{'has-error': editerrors.email}">
                                                    <input type="email" v-model="company.email" class="form-control" id="email" placeholder="Enter email">
                                                    <span v-if="editerrors.email" class="help-block text-danger">{{ editerrors.email[0] }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="logo">Logo</label>
                                                <div :class="{'has-error': editerrors.logo}">
                                                    <img :src = company.logo :width= 100 :height= 100>
                                                    <input type="file" @change="processEditFile($event)" ref="logo" accept="image/x-png, image/jpeg" class="form-control" id="logo" placeholder="Upload Logo">
                                                    
                                                    <span v-if="editerrors.logo" class="help-block text-danger">{{ editerrors.logo[0] }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <div :class="{'has-error': editerrors.website}">
                                                    <input type="text" v-model="company.website" class="form-control" id="website" placeholder="Enter Website">
                                                    <span v-if="editerrors.website" class="help-block text-danger">{{ editerrors.website[0] }}</span>
                                                </div>
                                            </div>
                                            <button type="submit" style="float: right;" class="btn btn-primary ml-2">
                                                Save
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="card-footer d-flex justify-content-center">
                <!-- Pagination (prev) -->
                <paginate
                    :page-count="pageCount"
                    :click-handler="fetch"
                    :prev-text="'Prev'"
                    :next-text="'Next'"
                    :container-class="'pagination'">
                </paginate>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</template>

<script>
    export default {

        data() {
            return {
                companies: [],
                pageCount: 1,
                endpoint: '../api/companies?page=',
                //create new
                errors: [],
                saved: false,
                name: null,
                email: null,
                logo: null,
                website: null,
                //edit
                editerrors: [],
                edited: false,
                editname: null,
                editemail: null,
                editlogo: null,
                logoname: null,
                editwebsite: null,
                editCompany : {
                    name: null,
                    email: null,
                    logo: null,
                    website: null,
                }
                
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.companies = data.data;
                        this.pageCount = data.meta.last_page;
                    });
            },
            //delete
            del(id) {
                if(confirm('Are you sure you want to delete this company?')) {
                    axios.delete('../api/companies/' + id);
                    let index = this.companies.findIndex(company => company.id === id);
                    this.companies.splice(index, 1);
                }
            },
            //new
            processFile(event) {
                this.logo = event.target.files[0];
            },
            onSubmit() {
                this.saved = false;
                const newcompany = new FormData();
                newcompany.append('name', this.name);
                newcompany.append('email', this.email);
                newcompany.append('logo', this.logo);
                newcompany.append('website', this.website);
                
                axios.post('../api/companies', newcompany
                ).then(({data}) => this.setSuccessMessage())
                .catch(({response}) => this.setErrors(response));
            },

            setErrors(response) {
                this.errors = response.data.errors;
                console.log(response);
            },

            setSuccessMessage() {
                this.reset();
                var link = document.getElementById('companymodalclose')
                link.click();
                this.saved = true;
                setInterval(() => {
                    this.saved = false;
                }, 10000);
            },

            reset() {
                this.errors = [];
                this.name = null;
                this.email = null;
                this.website = null;
                this.logo = null;
            },
            //edit
            editModal(company, id){
                this.editCompany = company;
                $('#CompanyEdit').modal('show');
            },
            processEditFile(event) {
                this.editlogo = event.target.files[0];
                this.logoname = event.target.files[0].name;
            },
            onUpdate(id) {
                this.edited = false;
                axios.put('../api/companies/' + id, this.editCompany
                ).then(({data}) => this.setEditSuccessMessage())
                .catch(({response}) => this.setEditErrors(response));
            },

            setEditErrors(response) {
                this.editerrors = response.data.errors;
                console.log(response);
            },

            setEditSuccessMessage() {
                this.editReset();
                var link = document.getElementById('editmodalclose')
                link.click();
                this.edited = true;
                setInterval(() => {
                    this.edited = false;
                }, 10000);
            },

            editReset() {
                this.editerrors = [];
            }
        }
    }
</script>