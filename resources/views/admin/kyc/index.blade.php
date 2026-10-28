@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All KYC Requests</h3>
                <div class="card-actions">
                    <a href="#" class="btn btn-primary btn-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Add new
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Title</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Maryjo Lebarree</td>
                          <td class="text-secondary">Civil Engineer, Product Management</td>
                          <td class="text-secondary"><a href="#" class="text-reset">mlebarree5@unc.edu</a></td>
                          <td class="text-secondary">User</td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Egan Poetz</td>
                          <td class="text-secondary">Research Nurse, Engineering</td>
                          <td class="text-secondary"><a href="#" class="text-reset">epoetz6@free.fr</a></td>
                          <td class="text-secondary">User</td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Kellie Skingley</td>
                          <td class="text-secondary">Teacher, Services</td>
                          <td class="text-secondary"><a href="#" class="text-reset">kskingley7@columbia.edu</a></td>
                          <td class="text-secondary">User</td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Christabel Charlwood</td>
                          <td class="text-secondary">Tax Accountant, Engineering</td>
                          <td class="text-secondary"><a href="#" class="text-reset">ccharlwood8@nifty.com</a></td>
                          <td class="text-secondary">Owner</td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Haskel Shelper</td>
                          <td class="text-secondary">Staff Scientist, Legal</td>
                          <td class="text-secondary"><a href="#" class="text-reset">hshelper9@woothemes.com</a></td>
                          <td class="text-secondary">User</td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
@endsection


