<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' integrity='sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==' crossorigin='anonymous' referrerpolicy='no-referrer' />
</head>
<body>
    <!-- Content Here --> 
    <div style="height: 100vh">
        <div class="row h-100 m-0">
            <div class="card w-50 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center text-danger">
                        <i class="fa-solid fa-user-plus"></i>
                        REGISTER
                    </h1>
                </div>
                <div class="card-body">
                    <form action="../actions/register.php" method="post">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="first-name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required autofocus>
                                </div>
                                <div class="col">
                                    <label for="last-name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" maxlength="15" required >
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" minlength="8" aria-describedby="password-info" required >
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>