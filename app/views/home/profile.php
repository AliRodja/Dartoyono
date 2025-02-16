<div class="container mt-3">
    <div class=" p-4">
        <h2 class="text-center mb-4">Update Profile</h2>
        
        <!-- Form Update Profile -->
        <form action="/update_profile/<?php echo $_SESSION['user']['user_id']; ?>" method="POST" enctype="multipart/form-data" class="row g-3">
            <!-- Username -->
            <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo $user['username']; ?>" required>
            </div>
            
            <!-- Email -->
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
            </div>
            
            <!-- Full Name -->
            <div class="col-md-6">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo $user['full_name']; ?>" required>
            </div>
            
            <!-- Birth Date -->
            <div class="col-md-6">
                <label for="birth_date" class="form-label">Birth Date</label>
                <input type="date" id="birth_date" name="birth_date" class="form-control" value="<?php echo $user['birth_date']; ?>" required>
            </div>
            
            <!-- Gender -->
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option value="M" <?php echo ($user['gender'] == 'M') ? 'selected' : ''; ?>>Male</option>
                    <option value="F" <?php echo ($user['gender'] == 'F') ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>
            
            <!-- Profile Photo -->
            <div class="col-md-6">
                <label for="profile_photo" class="form-label">Profile Photo</label>
                <input type="file" id="profile_photo" name="profile_photo" class="form-control">
                <?php if ($user['profile_photo']) : ?>
                    <div class="mt-2">
                        <img src="/<?php echo $user['profile_photo']; ?>" alt="Current Profile Photo" class="img-thumbnail" width="100">
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Request to Become a Writer -->
            <div class="col-12">
                <div class="form-check">
                    <input type="checkbox" id="request_writer" name="request_writer" class="form-check-input" <?php echo ($user['request_status'] == 'pending' || $user['request_status'] == 'approved') ? 'disabled' : ''; ?>>
                    <label for="request_writer" class="form-check-label">Request to Become a Writer</label>
                </div>
                <?php if ($user['request_status'] == 'pending') : ?>
                    <p class="text-warning small mt-2">Your request to become a writer is pending approval.</p>
                <?php elseif ($user['request_status'] == 'approved') : ?>
                    <p class="text-success small mt-2">Your request to become a writer has been approved.</p>
                <?php endif; ?>
            </div>
            
            <!-- Submit Button -->
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary w-50">Update Profile</button>
            </div>
        </form>
    </div>
</div>