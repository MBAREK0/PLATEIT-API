

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Fixed Sidebars</title>
</head>
<body>
<section class="mycontainer row ">
    <section class="sidebar left-sidebar  " >
        <p>Left Sidebar Content</p>
    </section>


    <section class="content-wrapper" id="mymain" mt-5  col-lg-8 col-md-8 col-lg-12  container">
        <div class="phone">
    
            <header class=" navbar ">
                <img src="img/logowhite.png" class ="logo" alt="logo">
                <div class="right-nav flex">
                <div class="flex nav-points">
                    <img src="img/$blue.png" class="phone-icons" alt="points">
                    <p>2.5K</p>
                </div>
                <div>
                    <img src="img/notif.png" class="phone-icons" alt="notification">
                </div>
                <div class="dropdown">
                    <img src="img/dropdown.png" class="drop-icon"  alt="dropdown">
                    <p>restaurants</p>
                </div>
                </div>

            </header>

            <nav class="phone-container nav ">
                <div class="firstdiv">
                    <img src="img/sid-icon.png" class="phone-icons" alt="notification">
                </div>
                <div class="seconddiv">
                    <ul class="nav-lists">
                        <li class="nav-list">
                            For you
                        </li>
                        <li class="nav-list">
                            Restaurants
                        </li>
                    </ul>
                </div>
                <div class="lastdiv">
                    <input type="text" class="search">
                </div>

            </nav>
            
        </div>
        <div class="phone-container">
           <div class="create-article "  id="c-article">
                <div class="pic-discreption">
                    <img src="img/profile.png" class="profile-pic"  alt="profile">
                    <input type="text" class="create-discreption" placeholder="Nwe plate...">
                </div>
            </div>   
        </div>
            
    </section>


    <section class="sidebar right-sidebar  ">
        <p>Right Sidebar Content</p>
        <button class="mybtn" id="mode">dark</button>
    </section>
</section>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>



