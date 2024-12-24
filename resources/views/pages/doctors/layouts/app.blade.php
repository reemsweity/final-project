<!DOCTYPE html>
<!-- This site was created in Webflow. https://webflow.com --><!-- Last Published: Wed May 22 2024 10:44:37 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="medcare-template.webflow.io" data-wf-page="65e40ce026880298571bc1d9"
    data-wf-site="65c992c37023d69385565acc" lang="en">
<!-- Mirrored from medcare-template.webflow.io/doctors by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:16 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Doctors</title>
    <meta content="Doctors" property="og:title" />
    <meta content="Doctors" property="twitter:title" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link href="../assets-global.website-files.com/65c992c37023d69385565acc/css/medcare-template.webflow.1b5882e1f.css"
        rel="stylesheet" type="text/css" />
        <link href="../assets-global.website-files.com/65c992c37023d69385565acc/css/doctor.css"
        rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                .className += t + "touch")
        }(window, document);
    </script>
    <link href="{{ asset('doc_on_call_logo_icon.png') }}"
    rel="shortcut icon"  />
    <link href="../cdn.prod.website-files.com/65c992c37023d69385565acc/65c9dc398a42023d2fd60f43_webclip_256x256px.png"
        rel="apple-touch-icon" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

@include('pages.doctors.layouts.navbar')
@yield('content')
@include('pages.doctors.layouts.footer')
</div><a href="#Scroll-Top" class="scroll-to-top w-inline-block"><img
    src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65e7e75caa3c9f54b384abff_arrow-up.svg"
    loading="lazy" alt="Arrow Image" class="arrow-icon" /></a>
<script src="../d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c843fc.js?site=65c992c37023d69385565acc"
type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
</script>
<script src="../assets-global.website-files.com/65c992c37023d69385565acc/js/webflow.e72dc5e5f.js"
type="text/javascript"></script>
<script>
    function openModal(appointmentId) {
        document.getElementById('zoomModal').style.display = 'block';
        document.getElementById('modalOverlay').style.display = 'block';
        document.getElementById('appointmentId').value = appointmentId;
    }

    function closeModal() {
        document.getElementById('zoomModal').style.display = 'none';
        document.getElementById('modalOverlay').style.display = 'none';
    }
    function openUserModal(userId) {
        // Make an AJAX request to get the user details
        fetch('/doctor/user/' + userId)
            .then(response => response.json())
            .then(data => {
                document.getElementById('userDetails').innerHTML = `
                    <p>Email: ${data.email}</p>
                    <p>Phone: ${data.phone}</p>
                    <p>Gender: ${data.gender}</p>
                    <p>Age: ${data.age}</p>
                    <p>Current Medications: ${data.current_medications}</p>
                    <p>Allergies: ${data.allergies}</p>
                    <p>Medical History: ${data.medical_history}</p>
                `;
                document.getElementById('userModal').style.display = 'block';
                document.getElementById('modalOverlay').style.display = 'block';
            });
    }

    function closeUserModal() {
        document.getElementById('userModal').style.display = 'none';
        document.getElementById('modalOverlay').style.display = 'none';
    }
</script>
</body>
<!-- Mirrored from medcare-template.webflow.io/doctors by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:19 GMT -->

</html>  