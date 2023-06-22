<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="signup.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    </head>

    <body>
        
        <div class="container">
            <div class="mytitle">
                <h1 class="maintitle">e-Titles</h1>
            </div>    
            <br><br>
            <h1>Activate Account</h1>
            

            <form action="<?php echo e(route('actionactivateaccount')); ?>" method="post">
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>
                <?php if(Session::has('fail')): ?>
                <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="activationcode">Activation Code</label>
                    <input type="text" class="form-control" id="firstName" name="activationcode" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <button type="submit" class="btn btn-primary">Activate</button>

            </form>
          
        </div>
    </body>
</html><?php /**PATH C:\xampp\htdocs\etitles\resources\views/activateaccount.blade.php ENDPATH**/ ?>