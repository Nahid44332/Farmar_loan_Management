@extends('backend.master')

@section('content')

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#eef2f7;
    font-family:Arial,sans-serif;
    overflow-x:hidden;
}

/* =========================
    SIDEBAR
========================= */

.sidebar{
    position:fixed;
    top:0;
    left:0;
    width:280px;
    height:100vh;
    overflow-y:auto;
    z-index:2000; /* আগে 999 ছিল */
    transition:0.4s;
}

/* Desktop Content */
.page_area{
    margin-left:280px;
    padding:30px;
    transition:0.4s;
}

/* Scrollbar */
.sidebar::-webkit-scrollbar{
    width:5px;
}

.sidebar::-webkit-scrollbar-thumb{
    background:#10b981;
    border-radius:20px;
}

/* =========================
    MOBILE NAVBAR
========================= */

/* MOBILE NAVBAR */
.mobile_topbar{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    background:#ffffff;
    padding:15px 20px;
    z-index:1500; /* sidebar থেকে কম */
    box-shadow:0 5px 20px rgba(0,0,0,0.06);
    align-items:center;
    justify-content:space-between;
}

.mobile_topbar h2{
    font-size:20px;
    font-weight:800;
    color:#111827;
    margin:0;
}

.menu_btn{
    width:45px;
    height:45px;
    border:none;
    border-radius:12px;
    background:#10b981;
    color:#fff;
    font-size:20px;
}

/* Overlay */

.sidebar_overlay{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.4);
    z-index:1400;
    opacity:0;
    visibility:hidden;
    transition:0.4s;
}


/* =========================
    PAGE DESIGN
========================= */

.top_title{
    background:#ffffff;
    margin-top: 150px;
    padding:20px 30px;
    border-radius:24px;
    margin-bottom:30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.top_title h2{
    font-size:32px;
    font-weight:800;
    color:#0f172a;
    margin:0;
}

/* এই কোডটি আপনার মেইন লেআউট বা মাস্টার ফাইলে দিন */
header, .top-bar { /* আপনার টপ বারের ক্লাস এখানে দিন */
    position: fixed;
    top: 50px;
    right: 0;
    width: calc(100% - 280px); /* সাইডবারের উইডথ ২৮০পিএক্স বাদ দিয়ে বাকিটুকু */
    height: 90px; /* আপনার টপ বারের উচ্চতা */
    z-index: 1000;
    background: white;
    transition: 0.4s;
}

/* মোবাইলের জন্য যখন সাইডবার থাকে না */
@media(max-width: 991px) {
    header, .top-bar {
        width: 100%;
        left: 0;
    }
}

.about_card{
    background:#ffffff;
    border-radius:30px;
    padding:35px;
    margin-bottom:35px;
    box-shadow:0 15px 40px rgba(0,0,0,0.05);
    border:1px solid #e5e7eb;
    position:relative;
    overflow:hidden;
}

.about_card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:6px;
    height:100%;
    background:linear-gradient(to bottom,#10b981,#059669);
}

.section_heading{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:30px;
}

.section_heading h3{
    font-size:30px;
    font-weight:800;
    color:#111827;
}

.section_badge{
    background:#d1fae5;
    color:#065f46;
    padding:8px 18px;
    border-radius:30px;
    font-size:14px;
    font-weight:700;
}

.form_group{
    margin-bottom:25px;
}

.form-label{
    font-size:16px;
    font-weight:700;
    color:#111827;
    margin-bottom:12px;
    display:block;
}

.form-control{
    width:100%;
    border:none;
    background:#f8fafc;
    border:2px solid #e5e7eb;
    border-radius:18px;
    padding:16px 18px;
    font-size:15px;
    color:#111827;
    transition:0.3s;
    box-shadow:none !important;
}

.form-control:focus{
    border-color:#10b981;
    background:#fff;
}

textarea.form-control{
    min-height:170px;
    resize:none;
}

.preview_area{
    margin-top:15px;
    margin-bottom:20px;
}

.preview_img{
    width:220px;
    height:150px;
    object-fit:cover;
    border-radius:20px;
    border:4px solid #ecfdf5;
    box-shadow:0 10px 30px rgba(16,185,129,0.15);
}

.custom_file{
    background:#f8fafc;
    border:2px dashed #cbd5e1;
    border-radius:18px;
    padding:20px;
    text-align:center;
    transition:0.3s;
}

.custom_file:hover{
    border-color:#10b981;
    background:#f0fdf4;
}

.submit_btn{
    border:none;
    background:linear-gradient(135deg,#10b981,#059669);
    color:#fff;
    padding:15px 35px;
    border-radius:18px;
    font-size:16px;
    font-weight:700;
    transition:0.3s;
    margin-top:25px;
    box-shadow:0 10px 25px rgba(16,185,129,0.25);
}

.submit_btn:hover{
    transform:translateY(-2px);
}

/* =========================
    MOBILE RESPONSIVE
========================= */

@media(max-width:991px){

    .mobile_topbar{
        display:flex;
    }

    .sidebar{
        left:-300px;
    }

    .sidebar.active{
        left:0;
    }

    .sidebar_overlay.active{
        opacity:1;
        visibility:visible;
    }

    .page_area{
        margin-left:0;
        padding:100px 15px 20px;
    }

    .top_title{
        padding:18px 20px;
        border-radius:18px;
    }

    .top_title h2{
        font-size:24px;
    }

    .about_card{
        padding:22px;
        border-radius:22px;
    }

    .section_heading{
        flex-direction:column;
        align-items:flex-start;
        gap:12px;
    }

    .section_heading h3{
        font-size:24px;
        line-height:1.4;
    }

    .section_badge{
        font-size:12px;
        padding:7px 15px;
    }

    .form-control{
        padding:14px 15px;
        font-size:14px;
        border-radius:14px;
    }

    textarea.form-control{
        min-height:140px;
    }

    .preview_img{
        width:100%;
        height:auto;
    }

    .submit_btn{
        width:100%;
        padding:15px;
        border-radius:14px;
    }

}

@media(max-width:576px){

    .page_area{
        padding:90px 12px 20px;
    }

    .about_card{
        padding:18px;
    }

    .section_heading h3{
        font-size:21px;
    }

    .top_title h2{
        font-size:21px;
    }

}

</style>

<!-- MOBILE TOPBAR -->
<div class="mobile_topbar">

    <button class="menu_btn" id="menuToggle">
        <i class="fa fa-bars"></i>
    </button>

    <h2>
        About Panel
    </h2>

</div>

<!-- OVERLAY -->
<div class="sidebar_overlay" id="sidebarOverlay"></div>

<div class="page_area">

    <div class="top_title">
        <h2>
            About Section Management
        </h2>
    </div>

    {{-- WHO WE ARE --}}
    <div class="about_card">

        <div class="section_heading">
            <h3>Who We Are Section</h3>
            <span class="section_badge">Section 01</span>
        </div>

        <form action="{{ route('about.section.update','who_we_are') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form_group">

                <label class="form-label">
                    Title
                </label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ $sections['who_we_are']->title ?? '' }}"
                       placeholder="Enter title">

            </div>

            <div class="form_group">

                <label class="form-label">
                    Description
                </label>

                <textarea name="description"
                          class="form-control"
                          placeholder="Write description here...">{{ $sections['who_we_are']->description ?? '' }}</textarea>

            </div>

            <div class="form_group">

                <label class="form-label">
                    Upload Image
                </label>

                @if(isset($sections['who_we_are']) && $sections['who_we_are']->image)

                    <div class="preview_area">
                        <img src="{{ asset($sections['who_we_are']->image) }}"
                             class="preview_img">
                    </div>

                @endif

                <div class="custom_file">

                    <input type="file"
                           name="image"
                           class="form-control">

                </div>

            </div>

            <button class="submit_btn">
                Update Section
            </button>

        </form>

    </div>

    {{-- MISSION --}}
    <div class="about_card">

        <div class="section_heading">
            <h3>Mission Section</h3>
            <span class="section_badge">Section 02</span>
        </div>

        <form action="{{ route('about.section.update','mission') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form_group">

                <label class="form-label">
                    Title
                </label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ $sections['mission']->title ?? '' }}"
                       placeholder="Enter title">

            </div>

            <div class="form_group">

                <label class="form-label">
                    Description
                </label>

                <textarea name="description"
                          class="form-control"
                          placeholder="Write description here...">{{ $sections['mission']->description ?? '' }}</textarea>

            </div>

            <div class="form_group">

                <label class="form-label">
                    Upload Image
                </label>

                @if(isset($sections['mission']) && $sections['mission']->image)

                    <div class="preview_area">
                        <img src="{{ asset($sections['mission']->image) }}"
                             class="preview_img">
                    </div>

                @endif

                <div class="custom_file">

                    <input type="file"
                           name="image"
                           class="form-control">

                </div>

            </div>

            <button class="submit_btn">
                Update Section
            </button>

        </form>

    </div>

    {{-- FUTURE PLAN --}}
    <div class="about_card">

        <div class="section_heading">
            <h3>Future Plan Section</h3>
            <span class="section_badge">Section 03</span>
        </div>

        <form action="{{ route('about.section.update','future_plan') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form_group">

                <label class="form-label">
                    Title
                </label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ $sections['future_plan']->title ?? '' }}"
                       placeholder="Enter title">

            </div>

            <div class="form_group">

                <label class="form-label">
                    Description
                </label>

                <textarea name="description"
                          class="form-control"
                          placeholder="Write description here...">{{ $sections['future_plan']->description ?? '' }}</textarea>

            </div>

            <div class="form_group">

                <label class="form-label">
                    Upload Image
                </label>

                @if(isset($sections['future_plan']) && $sections['future_plan']->image)

                    <div class="preview_area">
                        <img src="{{ asset($sections['future_plan']->image) }}"
                             class="preview_img">
                    </div>

                @endif

                <div class="custom_file">

                    <input type="file"
                           name="image"
                           class="form-control">

                </div>

            </div>

            <button class="submit_btn">
                Update Section
            </button>

        </form>

    </div>

</div>

<script>

    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    menuToggle.addEventListener('click', () => {

        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');

    });

    overlay.addEventListener('click', () => {

        sidebar.classList.remove('active');
        overlay.classList.remove('active');

    });

</script>

@endsection