<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<style>

    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    overflow:hidden;
}

/* ===========================
   Background Video
=========================== */

#bg-video{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    object-fit:cover;
    z-index:-2;
    filter:brightness(.8) saturate(1.1);
}

/* ===========================
   Overlay
=========================== */

.overlay{
    position:fixed;
    inset:0;

    background:
    linear-gradient(
        rgba(0,0,0,.35),
        rgba(0,0,0,.55)
    );

    z-index:-1;
}

/* ===========================
   Glass Card
=========================== */

.glass-card{

    width:430px;

    padding:45px;

    border-radius:28px;

    background:rgba(255,255,255,.08);

    border:1px solid rgba(255,255,255,.22);

    backdrop-filter:blur(28px);
    -webkit-backdrop-filter:blur(28px);

    box-shadow:
        0 25px 50px rgba(0,0,0,.45),
        inset 0 1px 0 rgba(255,255,255,.25),
        inset 0 -1px 0 rgba(255,255,255,.05);

    animation:popup .9s ease;

    transition:.4s ease;
}

.glass-card:hover{

    transform:translateY(-5px);

    box-shadow:
        0 35px 70px rgba(0,0,0,.55),
        0 0 35px rgba(255,255,255,.08);

}

/* ===========================
   Heading
=========================== */

h2{

    color:white;

    text-align:center;

    margin-bottom:35px;

    font-size:34px;

    letter-spacing:1px;

    text-shadow:
        0 3px 15px rgba(0,0,0,.45);

}

/* ===========================
   Inputs
=========================== */

input{

    width:100%;

    padding:16px 18px;

    margin-bottom:18px;

    border-radius:14px;

    border:1px solid rgba(255,255,255,.15);

    background:rgba(255,255,255,.12);

    color:#fff;

    font-size:15px;

    outline:none;

    transition:.35s;
}

input::placeholder{

    color:rgba(255,255,255,.75);

}

input:hover{

    background:rgba(255,255,255,.18);

}

input:focus{

    background:rgba(255,255,255,.22);

    border-color:rgba(255,255,255,.55);

    box-shadow:
        0 0 18px rgba(255,255,255,.15);

    transform:translateY(-2px);

}

/* ===========================
   Password
=========================== */

.password-box{
    position: relative;
    width: 100%;
    margin-bottom: 18px;
}

.password-box input{
    width: 100%;
    padding: 16px 55px 16px 18px;
    margin-bottom: 0;
}

.eye{
    position: absolute;

    right: 18px;
    top: 50%;

    display: flex;
    justify-content: center;
    align-items: center;

    width: 24px;
    height: 24px;

    transform: translateY(-50%);

    color: rgba(255,255,255,.9);

    cursor: pointer;
    user-select: none;

    transition: .3s ease;
}

.eye:hover{
    color: #ffffff;
    transform: translateY(-50%) scale(1.15);
}

/* ===========================
   Error
=========================== */

span{

    display:block;

    margin-top:-10px;

    margin-bottom:12px;

    color:#ff8f8f;

    font-size:14px;

}

/* ===========================
   Button
=========================== */

button{

    width:100%;

    padding:16px;

    border:none;

    border-radius:14px;

    background:
        linear-gradient(
            135deg,
            #ffffff,
            #dfe9f3
        );

    color:#111;

    font-size:17px;

    font-weight:bold;

    cursor:pointer;

    overflow:hidden;

    transition:.35s;

    position:relative;

}

button:hover{

    transform:translateY(-3px);

    letter-spacing:2px;

    box-shadow:
        0 12px 25px rgba(255,255,255,.25);

}

button:active{

    transform:scale(.98);

}

/* Shine Animation */

button::before{

    content:"";

    position:absolute;

    top:0;

    left:-100%;

    width:50%;

    height:100%;

    background:

    linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,.8),
        transparent
    );

    transition:.6s;

}

button:hover::before{

    left:150%;

}

/* ===========================
   Bottom Text
=========================== */

p{

    margin-top:22px;

    text-align:center;

    color:white;

}

a{

    color:white;

    font-weight:bold;

    text-decoration:none;

    transition:.3s;

}

a:hover{

    color:#8defff;

    text-shadow:0 0 12px #8defff;

}

/* ===========================
   Animation
=========================== */

@keyframes popup{

    from{

        opacity:0;

        transform:
            translateY(40px)
            scale(.92);

    }

    to{

        opacity:1;

        transform:
            translateY(0)
            scale(1);

    }

}
        </style>

</head>

<body>

<!-- Background Video -->

<video autoplay muted loop playsinline id="bg-video">

    <source src="{{ asset('videos/bg.mp4') }}" type="video/mp4">

</video>

<!-- Overlay -->

<div class="overlay"></div>

<!-- Glass Card -->

<div class="glass-card">

    <h2>Create Account</h2>

    <form action="/register" method="POST">

        @csrf

        <input
            type="text"
            name="name"
            placeholder="Enter Your Name"
            required
        >
        @error('name')
        <span style="color:red;">{{ $message }}</span>
        @enderror

        <input
            type="email"
            name="email"
            placeholder="Enter Your Email"
            required
        >
        @error('email')
        <span style="color:red;">{{ $message }}</span>
        @enderror

        <div class="password-box">

    <input
        type="password"
        id="password"
        name="password"
        placeholder="Enter Your Password"
        required
    >

    <span class="eye" onclick="togglePassword()">👁</span>

</div>

@error('password')
    <span style="color:red; display:block; margin-top:-12px; margin-bottom:12px;">
        {{ $message }}
    </span>
@enderror




        <button type="submit">
            Register
        </button>

    </form>

    <p>
        Already have an account?
        <a href="/login">
            Login
        </a>
    </p>

</div>

</body>

<script>

function togglePassword() {

    const password = document.getElementById("password");
    const eye = document.querySelector(".eye");

    if (password.type === "password") {
        password.type = "text";
        eye.innerHTML = "🙈";
    } else {
        password.type = "password";
        eye.innerHTML = "👁";
    }

}

</script>
</html>