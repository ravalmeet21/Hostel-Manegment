
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HostelGovernor</title>
    <link rel="icon" type="image/x-icon" href="iogo.jpg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Martian+Mono&display=swap');
*{
    font-family: 'Martian Mono', sans-serif;
}
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
    transition: 0.5s;
    scroll-behavior: smooth;
}

header {
    background-color: #333;
    overflow: auto;
    color: #fff;
    padding: 30px;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 10px;
    text-align: end;
}

.logo{
    max-width: 7%;
    height: 7%;
    display: block;
    float: left;
    margin: 0 auto;
}

nav li {
    display: inline;
    margin-right: 20px;
}

nav{
    background-color: #333;
    padding: 0px;
}

nav a {
    text-decoration: none;
    color: lightgrey;
    font-weight: bold;
}

nav a:hover {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

.container {
    max-width: 1300px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 15px; 
}

h2 {
    font-size: 24px;
    margin-top: 20px;
}

.image-gallery {
    display: flex;
    flex-wrap:wrap-reverse;
    justify-content: space-between;
}

.gallery-card {
    flex: 0 0 calc(25% - 20px); 
    margin: 10px 10px 40px 10px;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
    overflow: hidden;
    position: relative;
    border-radius: 15px;
    transition: 0.5s;
}

.gallery-card:hover {
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    margin-bottom: 20px;
    padding: 0px;
}

.gallery-card img {
    max-width: 100%;
    height: auto;
}

.card-details {
    padding: 10px;
    text-align: center;
    background-color: rgba(0, 0, 0, 0.7);
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-card:hover .card-details {
    opacity: 1;
    color: #fff;
}

.card-details p {
    margin: 0;
    font-size: 16px;
}


.icon-block svg {
    width: 100%;
    height: 100%;
  }

.big-card {
    margin: 20px 0;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
    overflow: hidden;
    align-items: center;
    position: relative;
    border-radius: 15px;
    display: flex;
}
.big-card:hover{
    transform: scale(1.05);
    background-color:whitesmoke;
}

.big-card-image {
    flex: 0 0 30%;
    overflow: hidden;
    display: flex;
    align-items: center;
    margin-right: 100px;
    justify-content:space-between;
}

.big-card-image img {
    max-width: 100%;
    height: auto;
    width: 100%;
}

.small-card {
    flex: 0 0 50%; 
    background-color: #f9f9f9;
    padding: 20px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    text-align: center;
    margin-top: 10px;
    border-radius: 15px;
}

.small-card + .small-card {
    margin-left: 10px;
}


.small-card h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.description {
    display: block; 
    background-color: #fff;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ccc;
    overflow: hidden; 
}

.description p {
    font-size: 14px;
    color: #777;
    max-height: 100px; 
    overflow: hidden;
}

.description p::after {
    content: "...";
    display: inline;
}

.btn {
    background-color:floralwhite; 
    color: #fff; 
    padding: 10px 20px; 
    border: none;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease; 
}

.btn:hover {
    background-color:darkgray;
}

.team-section {
    background-color:whitesmoke;
    padding: 40px;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.team-member {
    width: calc(33.33% - 20px);
    margin: 10px;
    background-color: #fff;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 15px; 
}

.team-member:hover {
    transform: scale(1.05);
    background-color:aliceblue;
}

.member-info {
    padding: 10px;
    text-align: center;
}

.member-info h3 {
    font-size: 18px;
}

.member-info p {
    font-size: 14px;
}

.member-description {
    padding: 10px;
    font-size: 14px;
    color: #777;
}

    </style>
</head>
<body>
    <header>
        <img src="iogo.jpg" class="logo">
        <h1 style="align-self: center;">WELCOME TO HOSTEL GOVERNANCE</h1>
        <h4 style="align-self: center;">"Empowering Hostel Administrators, Streamline. Simplify. Succeed."</h4>
        <div>
    <nav>  
        <ul>
            <li><a href="#St_det">Students details</a></li>
            <li><a href="#Emp_det">Employee details</a></li>
            <li><a href="#B_det">Fees details</a></li>
            <li><a href="#Au">About Us</a></li>
        </ul>
    </nav>
</div>
    </header>
    
    <div class="container">
    
        <h1>Image Gallery</h1>
        <div class="image-gallery">
            <div class="gallery-card">
                <img src="img1.jpg" alt="Hostel Image 1">
                <div class="card-details">
                    <p>Games</p>
                </div>
            </div>
            <div class="gallery-card">
                <img src="img2.jpg" alt="Hostel Image 2">
                <div class="card-details">
                    <p>Hostel Room 1</p>
                </div>
            </div>
            <div class="gallery-card">
                <img src="Hostel-1.jpg" alt="Hostel Image 3">
                <div class="card-details">
                    <p>Hostel Room 2</p>
                </div>
            </div>

            <div class="gallery-card">
                <img src="img4.jpeg" alt="Hostel Image 1">
                <div class="card-details">
                    <p>Hostel Room 3</p>
                </div>
            </div>

            <div class="gallery-card">
                <img src="img5.jpg" alt="Hostel Image 1">
                <div class="card-details">
                    <p>Hostel Building</p>
                </div>
            </div>

            <div class="gallery-card">
                <img src="img6.jpg" alt="Hostel Image 1">
                <div class="card-details">
                    <p>Hostel Building</p>
                </div>
            </div>

            <div class="gallery-card">
                <img src="img7.jpg" alt="Hostel Image 1">
                <div class="card-details">
                    <p>Mess</p>
                </div>
            </div>

            <div class="gallery-card">
                <img src="img8.jpg" alt="Hostel Image 1">
                <div class="card-details">
                    <p>Mess</p>
                </div>
            </div>

            <div class="gallery-card">
                <img src="img9.jpg" alt="Hostel Image 1">
                <div class="card-details">
                    <p>Library</p>
                </div>
            </div>

        </div>

<div class="big-card" id="St_det">
    <div class="big-card-image">
        <img src="card1.jpg" alt="Background Image">
    </div>
    <div class="small-card">
        <h3>Students Details</h3>
        <div class="description" id="description1">
            <h4>Here By Clicking the Button You can view the details of Students </h4>
            <!-- <p>
                This is the description for Button 1 in Card 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed auctor elit eget bibendum volutpat. Integer non feugiat massa, nec elementum velit.
            </p> -->
        </div>
        <a href="st_add.php"><button class="btn">click here</button> </a>
    </div>
</div>

<div class="big-card" id="Emp_det">
    <div class="big-card-image">
        <img src="card2.jpg" alt="Background Image">
    </div>
    <div class="small-card">
        <h3>Employee Details</h3>
        
        <div class="description" id="description1">
            <h4>Here By Clicking the Button You can view the details of Employee </h4>
            <!-- <p>
                </p> -->
        </div>
        <a href="emp.php"><button class="btn">click here</button> </a>
    </div>
</div>

<div class="big-card" id="B_det">
    <div class="big-card-image">
        <img src="card3.jpeg" alt="Background Image">
    </div>
    <div class="small-card">
        <h3>Fees Details</h3>
        
        <div class="description" id="description1">
            <h4>Here By Clicking the Button You can view the details of your income and expenses</h4>
            <!-- <p>
                This is the description for Button 1 in Card 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed auctor elit eget bibendum volutpat. Integer non feugiat massa, nec elementum velit.
            </p> -->
        </div>
        <a href="bill.php"><button class="btn">click here</button> </a>
    </div>
</div>
<br><br>
<h1>About Us</h1>
<section class="team-section" id="Au">

    <div class="team-member">
        <div class="member-info">
            <h3>Sneh Patel</h3>
            <p>Email: 22CE099@charusat.edu.in</p>
            <p>Contact: 9904044900</p>
        </div>
        <!-- <p class="member-description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae justo et turpis posuere ultricies.
        </p> -->
    </div>
    <div class="team-member">
        <div class="member-info">
            <h3>Meet Raval</h3>
            <p>Email: 22CE111@charusat.edu.in</p>
            <p>Contact: 8735021405</p>
        </div>
        <!-- <p class="member-description">
            Nullam quis justo nec felis tempor consequat. Sed sit amet libero vel urna iaculis varius.
        </p> -->
    </div>
    <div class="team-member">
        <div class="member-info">
            <h3>Mahir Ramani</h3>
            <p>Email: 22CE105@charusat.edu.in</p>
            <p>Contact: 8160264792</p>
        </div>
        <!-- <p class="member-description">
            Aenean id fermentum tellus. Ut ullamcorper justo non ex efficitur, a suscipit urna tincidunt.
        </p> -->
    </div>
</section>

    </div>
</body>
</html>
