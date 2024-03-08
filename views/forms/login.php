<form id="login" action="/login" method="post" >
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <div class="input-group input-group-merge">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" title="Enter your email address" required autofocus>
                            <span class="input-group-text cursor-pointer"><i class="bx bx-envelope"></i></span>
                        </div>
                        <div class="form-text">You can use letters, numbers &amp; periods</div>
                    </div>
                    <div class="mb-3">
                        <label for="user-role" class="form-label">Role</label>
                        <select id="user-role" name="role" class="form-select" title="Choose a role" required>
                            <option value="administrator">Administrator</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                            <option value="parent">Parent</option>
                        </select>
                    </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        <a href="">
                            <small>Forgot Password?</small>
                        </a>
                    </div>
                    <div class="input-group input-group-merge">
                    <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="Password"
                        title="Enter your password"
                        title="Enter your password" 
                        minlength="8" maxlength="255" required
                        aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <span class="form-text">Enter at least 8 characters.</span>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit" name="login-btn">Login</button>
                </div>
              </form>
