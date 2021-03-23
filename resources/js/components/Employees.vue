<template>
<div class="main-content">

  <div class="container">
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
                  Employees
                </h1>
              </div>
              <div class="col-auto">
                <!-- Buttons -->
                <a data-toggle="modal" data-target="#EmployeeModal" href="#!" class="btn btn-primary ml-2">
                  Add employee
                </a>
                <div class="modal fade" id="EmployeeModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-card card" data-list="{&quot;valueNames&quot;: [&quot;name&quot;]}">
                                <div class="card-header">
                                    <!-- Title -->
                                    <h4 class="card-header-title" id="exampleModalCenterTitle">
                                        Add an Employee
                                    </h4>
                                    <!-- Close -->
                                    <button type="button" class="close" id="employeemodalclose" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <form method="post" @submit.prevent="onSubmit">
                                        <div class="form-group">
                                            <label for="company_id">Company</label>
                                            <div :class="{'has-error': errors.company_id}">
                                                <select v-model="newemployee.company_id" type="text" class="form-control" id="company_id" placeholder="Enter Company">
                                                    <option v-for="company in companies" :key="company.id" :value="company.id">{{company.name}}</option>
                                                </select>
                                                <span v-if="errors.company_id" class="help-block text-danger">{{ errors.company_id[0] }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">First Name<span style="color:red">*</span></label>
                                            <div :class="{'has-error': errors.first_name}">
                                                <input type="text" v-model="newemployee.first_name" class="form-control" id="first_name" placeholder="Enter First Name">
                                                <span v-if="errors.first_name" class="help-block text-danger">{{ errors.first_name[0] }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last Name<span style="color:red">*</span></label>
                                            <div :class="{'has-error': errors.last_name}">
                                                <input type="text" v-model="newemployee.last_name" class="form-control" id="last_name" placeholder="Enter Last Name">
                                                <span v-if="errors.last_name" class="help-block text-danger">{{ errors.last_name[0] }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div :class="{'has-error': errors.email}">
                                                <input v-model="newemployee.email" type="email" class="form-control" id="email" placeholder="Enter Email">
                                                <span v-if="errors.email" class="help-block text-danger">{{ errors.email[0] }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">phone</label>
                                             <div :class="{'has-error': errors.phone}">
                                                <input type="text" v-model="newemployee.phone" class="form-control" id="phone" placeholder="Enter Phone Number">
                                                <span v-if="errors.phone" class="help-block text-danger">{{ errors.phone[0] }}</span>
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
            <strong>Success!</strong> Employee has been saved successfully.
        </div>
        <div class="alert alert-success" v-if="edited">
            <strong>Success!</strong> Employee has been edited successfully.
        </div>

        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="companiesListPane" role="tabpanel" aria-labelledby="companiesListTab">
            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["employee-firstname", "employee-lastname", "employee-email", "employee-phone", "employee-company", "employee-created"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="companiesList">
              
              <div class="table-responsive">
                <table class="table table-sm table-hover table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <a class="list-sort text-muted" data-sort="employee-id" href="#">ID</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="employee-firstname" href="#">First Name</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="employee-lastname" href="#">Last Name</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="employee-email" href="#">Email</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="employee-phone" href="#">Phone</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="employee-company" href="#">Company</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="list font-size-base">
                    <tr v-for="employee in employees" :key="employee.id">
                      <td>
                        <a class="employee-id text-reset" href="">{{ employee.id}}</a>
                      </td>
                      <td>
                        <a class="employee-firstname text-reset" href="">{{ employee.first_name }}</a>
                      </td>
                      <td>
                        <!-- Text -->
                        <span class="employee-lastname">{{ employee.last_name }}</span>
                      </td>
                      <td>
                        <!-- Text -->
                        <span class="employee-email">{{ employee.email }}</span>
                      </td>
                      <td>
                        <!-- Text -->
                        <span class="employee-phone">{{ employee.phone }}</span>
                      </td>
                      <td>
                        <!-- Text -->
                        <span class="employee-company">{{ employee.company_id }}</span>
                      </td>
                      <td>
                        <!-- Badge -->
                        <a href="" @click.prevent="editModal(employee, employee.id)"><span class="fe fe-edit mr-4"></span></a>  
                        <a href="" @click.prevent="del(employee.id)"><span class="fe fe-trash-2 mr-4"></span></a>
                      </td>
                      <div class="modal fade" id="EmployeeEdit" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-card card" data-list="{&quot;valueNames&quot;: [&quot;name&quot;]}">
                                    <div class="card-header">
                                        <!-- Title -->
                                        <h4 class="card-header-title" id="exampleModalCenterTitle">
                                            Add an Employee
                                        </h4>
                                        <!-- Close -->
                                        <button type="button" class="close" id="editmodalclose" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" @submit.prevent="onUpdate(employee.id)">
                                            <div class="form-group">
                                                <label for="company_id">Company</label>
                                                <div :class="{'has-error': editerrors.company_id}">
                                                    <select v-model="editemployee.company_id" type="text" class="form-control" id="company_id" placeholder="Enter Company">
                                                        <option v-for="company in companies" :key="company.id" :value="company.id" :selected="company.id === editemployee.company_id ? 'selected' : ''">{{company.name}}</option>
                                                    </select>
                                                    <span v-if="editerrors.company_id" class="help-block text-danger">{{ editerrors.company_id[0] }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="first_name">First Name<span style="color:red">*</span></label>
                                                <div :class="{'has-error': editerrors.first_name}">
                                                    <input type="text" v-model="editemployee.first_name" class="form-control" id="first_name" placeholder="Enter First Name">
                                                    <span v-if="editerrors.first_name" class="help-block text-danger">{{ editerrors.first_name[0] }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">Last Name<span style="color:red">*</span></label>
                                                <div :class="{'has-error': editerrors.last_name}">
                                                    <input type="text" v-model="editemployee.last_name" class="form-control" id="last_name" placeholder="Enter Last Name">
                                                    <span v-if="editerrors.last_name" class="help-block text-danger">{{ editerrors.last_name[0] }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <div :class="{'has-error': editerrors.email}">
                                                    <input v-model="editemployee.email" type="email" class="form-control" id="email" placeholder="Enter Email">
                                                    <span v-if="editerrors.email" class="help-block text-danger">{{ editerrors.email[0] }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">phone</label>
                                                <div :class="{'has-error': editerrors.phone}">
                                                    <input type="text" v-model="editemployee.phone" class="form-control" id="phone" placeholder="Enter Phone Number">
                                                    <span v-if="editerrors.phone" class="help-block text-danger">{{ editerrors.phone[0] }}</span>
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
    </div>
</div>
</template>

<script>
    export default {

        data() {
            return {
                companies: [],
                employees: [],
                pageCount: 1,
                endpoint: '../api/employees?page=',
                //create new
                errors: [],
                saved: false,
                newemployee: {
                    first_name: null,
                    last_name: null,
                    email: null,
                    phone: null,
                    company_id: null,
                },
                //edit
                editerrors: [],
                edited: false,
                editemployee: {
                    first_name: null,
                    last_name: null,
                    email: null,
                    phone: null,
                    company_id: null,
                },
            };
        },

        created() {
            this.fetch();
            this.comp();
        },

        methods: {
            comp(page = 1) {
                axios.get('../api/allcompanies')
                    .then(({data}) => {
                        this.companies = data.data;
                    });
            },
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.employees = data.data;
                        this.pageCount = data.meta.last_page;
                    });
            },
            //delete
            del(id) {
                if(confirm('Are you sure you want to delete this employee?')) {
                    axios.delete('../api/employees/' + id);
                    let index = this.companies.findIndex(employee => employee.id === id);
                    this.employees.splice(index, 1);
                }
            },
            //new
            onSubmit() {
                this.saved = false;
                axios.post('../api/employees', this.newemployee)
                    .then(({data}) => this.setSuccessMessage())
                    .catch(({response}) => this.setErrors(response));
                
            },

            setErrors(response) {
                this.errors = response.data.errors;
                console.log(response);
            },

            setSuccessMessage() {
                this.reset();
                var link = document.getElementById('employeemodalclose')
                link.click();
                this.saved = true;
                setInterval(() => {
                    this.saved = false;
                }, 10000);
            },

            reset() {
                this.errors = [];
                this.newemployee = {first_name: null, last_name: null, email: null, phone: null, company_id: null};
            },
            //edit
            editModal(employee, id){
                this.editemployee = employee;
                $('#EmployeeEdit').modal('show');
            },
            onUpdate(id) {
                this.saved = false;
                axios.put('../api/employees/' + id, this.editemployee)
                    .then(({data}) => this.setSuccessMessage())
                    .catch(({response}) => this.setErrors(response));
                
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