<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<body>
    <h1>Update Profile</h1>

    <?php
    if (isset($success_message)) {
        echo "<p style='color: green;'>$success_message</p>";
    }
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>

    <form action="/update_profile" method="POST" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>

        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="<?php echo $user['full_name']; ?>" required><br><br>

        <label for="birth_date">Birth Date:</label>
        <input type="date" id="birth_date" name="birth_date" value="<?php echo $user['birth_date']; ?>" required><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="M" <?php echo ($user['gender'] == 'M') ? 'selected' : ''; ?>>Male</option>
            <option value="F" <?php echo ($user['gender'] == 'F') ? 'selected' : ''; ?>>Female</option>
        </select><br><br>

        <label for="profile_photo">Profile Photo:</label>
        <input type="file" id="profile_photo" name="profile_photo"><br><br>

        <?php if ($user['profile_photo']) : ?>
            <img src="<?php echo $user['profile_photo']; ?>" alt="Current Profile Photo" width="100"><br>
            <p>Current Profile Photo</p>
        <?php endif; ?>

        <input type="submit" value="Update Profile">
    </form>
</body>
</html>