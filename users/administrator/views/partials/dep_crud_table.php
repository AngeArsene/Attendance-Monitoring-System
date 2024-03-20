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
                              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>