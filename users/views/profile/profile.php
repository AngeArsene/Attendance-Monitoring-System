<div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <hr class="my-0">
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="/users/controller/update_profile">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="name" name="first_name" value="<?= $user['first_name'] ?>"
                            minlength="4" maxlength="140">
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Last Name</label>
                            <input class="form-control" type="text" id="name" name="last_name" value="<?= $user['last_name'] ?>"
                            minlength="4" maxlength="140">
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="email" id="email" name="email" value="<?= $user['email'] ?>" placeholder="john.doe@example.com">
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" class="select2 form-select" name="gender">
                              <option value="male" <?= $user['gender'] === 'male' ? 'selected' : '' ?>>Male</option>
                              <option value="female" <?= $user['gender'] === 'female' ? 'selected' : '' ?>>Female</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">CMR (+237)</span>
                              <input type="number" id="phone-number" name="phone-number" class="form-control" value="<?= $user['phone_number'] ?>" placeholder="602 555 111"
                              minlength="9" maxlength="9" min="600000000" max="699999999">
                            </div>
                          </div>
                          <div class="mb-3 col-md-6 form-password-toggle">
                            <div class="d-flex justify-content-between">
                              <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                              <input type="password" id="password" class="form-control" name="password" placeholder="Password" aria-describedby="password"id="password" name="password" placeholder="Password" value="<?= $user['password'] ?>"
                              minlength="8" maxlength="255">
                              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?= $user['address'] ?>"
                            minlength="4" maxlength="255">
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" name="save-btn" class="btn btn-primary me-2">Save changes</button>
                          <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#modalTop">
                          Delete Account
                        </button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <div class="col-lg-4 col-md-6">
                      <div class="mt-3">
                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal modal-top fade" id="modalTop" tabindex="-1" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog">
                            <form class="modal-content" method="POST" action="/users/controller/delete_profile">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTopTitle">Delete Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="mb-3 col">
                                    <div class="alert alert-warning">
                                      <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
                                      <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="form-check col mb-0">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" required>
                                    <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="delete-btn" class="btn btn-danger">Delete</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                  </div>
                