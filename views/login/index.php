<?php 
    require_once 'app.php';
    //$username = $_POST['username'];
    //$password = $_POST['password'];

    $user_id = $_GET['id'] ?? 0;

    if($user_id) {
        $user = new User();
        $user->getUserById($user_id);
    }
    else {
        $user = new User();
    }
    
    if( isset($_POST['create'])) {
        global $db;
        
        // For validation form and db
        $valid = true;

        $user->firstname = trim( $_POST['firstname']);
        $user->lastname = trim( $_POST['lastname']);
        $user->email = trim( $_POST['email']);
        $user->pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        if( empty($user->firstname) || empty($user->lastname) || empty($user->email) || empty($user->pwd)) {
            $valid = false;
        }

        if ( !$user_id && $user->emailExists ($user->email)) {
            echo "This email is already in use. Try another one.";
            $valid = false;
        }

        if ($valid) {
            if($user_id) {
                $user->updateUser($user);
                echo "Succesvol $user_id geupdated";

            } else {
                $user_id = $user->createUser($user);
                $_SESSION['user_id'] = $user_id;
                header('Location:/login/profile/');
            }
        } else {
            // give feedback
            echo 'Registration failed';
        }  
    }
?>

<div class="content h-layout">
    <!-- <h2>Log in and start bidding</h2>
    
    <form method="POST">
        <label>
            Username: 
            <input type="text" name="username" placeholder="Username">
        </label>
        <label>
            Password: 
            <input type="password" name="password" placeholder="Password">
        </label>
        <button type="submit" class="secondary-btn">login</button>
    </form> -->

    <h2>Don't have an account yet? Register now!</h2>

    <form method="POST">
        <label>
            <span>Firstname</span>
            <input type="text" name="firstname" maxlenght="128" placeholder="Tim"
            value="<?php echo $user->firstname ?? ''; ?>" required>
        </label>

        <label>
            <span>Lastname</span>
            <input type="text" name="lastname" maxlenght="128" placeholder="De Saeger"
            value="<?php echo $user->lastname ?? ''; ?>" required>
        </label>

        <label>
            <span>E-mail</span>
            <input type="email" name="email" maxlenght="256" placeholder="timdesaeger@hotmail.be"
            value="<?php echo $user->email ?? ''; ?>" required>
        </label>

        <label>
            <span>Password</span>
            <input type="password" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>
        </label>

        <label>
            <span>Re-enter Password</span>
            <input type="password" name="password2" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>
        </label>
        
        <!-- <h2>Personal info</h2>
        <label>
            <span>Phone</span>
            <input type="text" name="phone" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{2}" maxlenght="28">
        </label>

        <label>
            <span>Street</span>
            <input type="text" name="street" maxlenght="128">
        </label>

        <label>
            <span>Number</span>
            <input type="text" name="number" maxlenght="16">
        </label>

        <label>
            <span>Bus</span>
            <input type="text" name="bus" maxlenght="16">
        </label>

        <label>
            <span>Postalcode</span>
            <input type="text" name="postalcode" maxlenght="16">
        </label>

        <label><span>City</span>
            <input type="text" name="city" maxlenght="128">
        </label>

        <label>
            <span>Country</span>
            <select name="country">
                <option value="">Select...</option>
                <option value="be">Belgium</option>
                <option value="fr">France</option>
                <option value="nl">Netherlands</option>
            </select>
        </label>

        <label>
            <span>Profile picture</span>
            <input type="file" name="photo" accept="image/png, image/jpeg">
        </label> -->

        <button type="submit" class="secondary-btn" name="create">Register</button>
    </form>
</div>
