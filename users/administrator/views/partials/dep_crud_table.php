<div class="card">
                <h5 class="card-header"><?= strtoupper($dep_name) ?> COURSES</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover text-center">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Number of hours</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Hours Remaining</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach ($courses as $course): ?>
                        <?php $id = $course['id'] ?>
                      <tr>
                        <td>
                          <?= $course['name'] ?>
                        </td>
                        <td>
                          <?= strtoupper(tuple('teacher', $course['teacher'])['first_name']) ?>
                        </td>
                        <td>
                          <?= $course['NOH'] ?>
                        </td>
                        <td>
                          <?= $course['start_date'] ?>
                        </td>
                        <td>
                          <?= $course['end_date'] ?>
                        </td>
                        <td>
                          <?= $course['hours_remaining'] ?>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <button
                                type="submit" 
                                class="dropdown-item" 
                                data-bs-toggle="modal"
                                data-bs-target="#basicModal<?= $id ?>"
                              ><i class="bx bx-edit-alt me-1"></i> Edit</button>
                              <button
                                type="button"
                                class="dropdown-item"
                                data-bs-toggle="modal"
                                data-bs-target="#modalTop<?= $id ?>"
                              ><i class="bx bx-trash me-1"></i> Delete</button>
                            </div>
                          </div>

                          
                          <div style="text-align: start !important;">
                            <!-- Button trigger modal -->
                      

                              <!-- Modal -->
                            <div class="modal fade" id="basicModal<?= $id ?>" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form class="modal-content" method="POST" action="/users/administrator/controller/edit_row">
                                  <input type="hidden" name="id" value="<?= $id ?>">
                                  <input type="hidden" name="table" value="<?= $table_name ?>">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1"><?= ucfirst($table_name) ?> Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input class="form-control" type="text" id="name" name="first_name" value="<?= $person['first_name'] ?>"
                                        minlength="4" maxlength="140">
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">Last Name</label>
                                        <input class="form-control" type="text" id="name" name="last_name" value="<?= $person['last_name'] ?>"
                                        minlength="4" maxlength="140">
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input class="form-control" type="email" id="email" name="email" value="<?= $person['email'] ?>" placeholder="john.doe@example.com">
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select id="gender" class="select2 form-select" name="gender">
                                          <option value="male">Male</option>
                                          <option value="female" <?= $person['gender'] === 'female' ? 'selected' : '' ?>>Female</option>
                                        </select>
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                          <span class="input-group-text">CMR (+237)</span>
                                          <input type="number" id="phone-number" name="phone-number" class="form-control" value="<?= $person['phone_number'] ?>" placeholder="602 555 111"
                                          minlength="9" maxlength="9" min="600000000" max="699999999">
                                        </div>
                                      </div>   
                                      <div class="mb-3 col-md-6">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?= $person['address'] ?>"
                                        minlength="4" maxlength="255">
                                      </div>
                                      <?php if ($table_name === 'teacher'): ?>                                                                       
                                        <div class="mb-3 col-md-6">
                                          <label for="gender" class="form-label">Department</label>
                                            <select id="gender" class="select2 form-select" name="department" required>
                                              <?php foreach ($departments as $department): 
                                                    $department_name = strtoupper($department['name'])?>
                                                <option <?= $person['department'] === $department['name'] ? 'selected' : '' ?> value="<?= $department['id'] ?>"><?= $department_name ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                      <?php endif; ?>                                                                      
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                      Close
                                    </button>
                                    <button type="submit" name="edit-btn" class="btn btn-primary">Save changes</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-lg-4 col-md-6">
                              <div style="text-align: start !important;">
                                <!-- Button trigger modal -->

                                <!-- Modal -->
                                <div class="modal modal-top fade" id="modalTop<?= $id ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <form class="modal-content" method="POST" action="/users/administrator/controller/delete_row">
                                      <input type="hidden" name="id" value="<?= $id ?>">
                                      <input type="hidden" name="table" value="course">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalTopTitle">Delete Record</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="mb-3 col">
                                            <div class="alert alert-warning">
                                              <h6 class="alert-heading mb-1">Are you sure you want to delete this row?</h6>
                                              <p class="mb-0">Once you delete it, there is no going back. Please be certain.</p>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row g-2">
                                          <div class="form-check col mb-0">
                                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation<?= $id ?>" required="">
                                            <label class="form-check-label" for="accountActivation<?= $id ?>">I confirm the record deletion</label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                          Close
                                        </button>
                                        <button type="submit" name="delete-row" class="btn btn-danger">Delete</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div> 