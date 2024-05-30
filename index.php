<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <script src="https://getbootstrap.com/docs/5.3/assets/js/color-modes.js"></script>

    <!-- Core scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Kitah">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Quick HTML Email Sender</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Favicons -->
    <meta name="theme-color" content="#712cf9">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        #emailBody {
            padding: 4px;
            height: 120px !important;
            /* overflow-y: scroll !important; */

            /* Deal with line breaks  */
            /* white-space: pre-wrap; */
        }

        #emailBody:focus {
            outline: 0px solid transparent;
        }
    </style>


</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z">
            </path>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z">
            </path>
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z">
            </path>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z">
            </path>
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (light)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#sun-fill"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light"
                    aria-pressed="true">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="arrow-right-circle" viewBox="0 0 16 16">
            <path
                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z">
            </path>
        </symbol>
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Send Custom HTML Email</title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
            </path>
        </symbol>
    </svg>

    <div class="col-lg-8 mx-auto p-4 py-md-5">
        <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
            <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Send Custom HTML Email</span>
            </a>
        </header>

        <main>
            <div class="position-static d-block p-4 py-md-4">
                <div class="rounded-4 shadow">
                    <div class="p-5 pb-4 border-bottom-0">
                        <h1 class="fw-bold mb-0 fs-2">Enter details below</h1>
                    </div>

                    <div class="p-5 pt-0">

                        <div id="inputsWrapper" class="row border rounded-3 g-3 position-relative">
                            <h2 class="fs-5 fw-bold mb-3">SMTP server details</h2>

                            <div class="form-floating mb-3 col-md-6 position-relative">
                                <input type="text" class="form-control rounded-3" id="mailHost"
                                    placeholder="smtp.gmail.com" value="smtp.gmail.com">
                                <label for="mailHost">Mail Host</label>
                                <div class="invalid-tooltip">
                                    Mail Host is required.
                                </div>
                            </div>

                            <div class="form-floating mb-3 col-md-6 position-relative">
                                <input type="number" class="form-control rounded-3" id="port" placeholder="587"
                                    value="587">
                                <label for="port">Port</label>
                                <div class="invalid-tooltip">
                                    Port is required.
                                </div>
                            </div>

                            <div class="form-floating mb-3 col-md-6 position-relative">
                                <input type="email" class="form-control rounded-3" id="smtpUsername"
                                    placeholder="username@example.com" value="username@example.com">
                                <label for="smtpUsername">SMTP username (email)</label>
                                <div class="invalid-tooltip">
                                    SMTP username is required.
                                </div>
                            </div>

                            <div class="form-floating mb-3 col-md-6 position-relative">
                                <input type="password" class="form-control rounded-3" id="smtpPassword"
                                    placeholder="Password" value="12345678">
                                <label for="smtpPassword">SMTP Password</label>
                                <div class="invalid-tooltip">
                                    SMTP Password is required.
                                </div>
                            </div>

                            <hr class="my-4">
                            <h2 class="fs-5 fw-bold mb-3">Your email details</h2>

                            <div class="form-floating mb-3 col-md-6 position-relative">
                                <input type="email" class="form-control rounded-3" id="emailFrom"
                                    placeholder="your-email@example.com" value="your-email@example.com">
                                <label for="emailFrom">Email from (Your address)</label>
                                <div class="invalid-tooltip">
                                    Email from is required.
                                </div>
                            </div>

                            <div class="form-floating mb-3 col-md-6 position-relative">
                                <input type="text" class="form-control rounded-3" id="emailFromName"
                                    placeholder="Kelvin" value="Kelvin">
                                <label for="emailFromName">Email from (Your name)</label>
                                <div class="invalid-tooltip">
                                    Your name is required.
                                </div>
                            </div>

                            <div class="form-floating mb-3 col-md-6 position-relative">
                                <input type="email" class="form-control rounded-3" id="recipient"
                                    placeholder="recipient@example.com" value="recipient@example.com">
                                <label for="recipient">Recipient</label>
                                <div class="invalid-tooltip">
                                    Recipient is required.
                                </div>
                            </div>

                            <div class="form-floating mb-3 col-md-6 position-relative">
                                <input type="text" class="form-control rounded-3" id="subject"
                                    placeholder="Email Subject">
                                <label for="subject">Subject</label>
                                <div class="invalid-tooltip">
                                    Subject is required.
                                </div>
                            </div>

                            <hr class="my-4">
                            <h2 class="fs-5 fw-bold mb-3">Customize email body</h2>

                            <div class="form-floating mb-3 col-md-6 position-relative">
                                <input type="color" class="form-control rounded-3" id="backgroundColor"
                                    placeholder="#ffffff" value="#590b3e">
                                <label for="backgroundColor">Background color</label>
                            </div>

                            <div class="position-relative">
                                <span class="m-2"><strong>Heading</strong> <em>(HTML allowed)</em></span>
                                <div class="form-control rounded overflow-auto" id="heading" contenteditable>
                                    <p style="margin:0;font-size:14px;text-align:center"><span
                                            style="font-size:22px"><strong>Heya!</strong> 👋</span></p>
                                </div>
                            </div>

                            <div class="position-relative">
                                <span class="m-2"><strong>Intro Line</strong> <em>(HTML allowed)</em></span>
                                <div class="form-control rounded overflow-auto" id="introLine" contenteditable>
                                    <p style='margin: 0; font-size: 16px; text-align: center; line-height: 24px;'>
                                        Call me <strong>Kelvin</strong>. 😊</p>
                                </div>
                            </div>

                            <div class="position-relative">
                                <span class="m-2"><strong>Email Body</strong> <em>(HTML allowed)</em></span>
                                <div class="form-control rounded overflow-auto" id="emailBody" contenteditable>
                                    <p
                                        style='margin: 0; font-size: 16px; text-align: center; line-height: 24px; margin-top: 15px;'>
                                        I stumbled upon your Craigslist posting and well, I'm here to take you up on
                                        that.
                                        I'm <em>28</em> and happen to be looking for an FWB arrangement. I'm a
                                        <strong>realist</strong>, open-minded, and a tad bit reserved.
                                        A <strong>metalhead</strong> 🤘 and I've binged a few sitcoms if they're your
                                        thing too.
                                    </p>
                                    <p
                                        style='margin: 0; font-size: 16px; text-align: center; line-height: 24px; margin-top: 15px;'>
                                        5ft 6in height and <em>brown chocolate skin color</em>. Can't wait to make your
                                        acquaintance. 😊
                                    </p>
                                </div>
                            </div>

                            <div class="position-relative">
                                <span class="m-2"><strong>Intro Line</strong> <em>(HTML allowed)</em></span>
                                <div class="form-control rounded overflow-auto" id="outroLine" contenteditable>
                                    <p
                                        style='margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;'>
                                        <em>PS: I don't go collecting pics. Or do I? 😉</em>
                                    </p>
                                </div>
                            </div>

                            <div class="position-relative">
                                <span class="m-2"><strong>Footer text</strong> <em>(HTML allowed)</em></span>
                                <div class="form-control rounded overflow-auto" id="footerText" contenteditable>
                                    <p
                                        style='margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 14.399999999999999px;'>
                                        <span><strong>Kelvin | Mail</strong>.</span>
                                    </p>
                                </div>
                            </div>

                            <hr class="my-4">
                            <!-- Reply settings -->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="showReplyButton">
                                <label class="form-check-label" for="showReplyButton">Show reply button</label>
                            </div>

                            <div id="replySettings" style="display: none;">
                                <h2 class="fs-5 fw-bold mb-3">Reply settings (optional)</h2>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="allowReplyToCurrentSubject">
                                    <label class="form-check-label" for="allowReplyToCurrentSubject">
                                        Reply to a different subject (set above)
                                    </label>
                                </div>

                                <!-- Alternative subject -->
                                <div id="alternativeSubjectWrapper"
                                    class="form-floating mb-3 col-md-6 position-relative" style="display: none;">
                                    <input type="text" class="form-control rounded-3" id="alternativeSubject"
                                        placeholder="Alternative Subject">
                                    <label for="alternativeSubject">Alternative Subject</label>
                                </div>
                            </div>

                            <div class="my-2 mx-5">
                                <button class="w-75 mb-2 btn btn-lg rounded-3 btn-dark" id="submit" type="button">Send
                                    email</button>
                            </div>

                            <small class="text-body-secondary"><em>PHPMailer under the hood.</em></small>
                        </div>

                    </div>
                </div>
            </div>

        </main>
        <footer class="pt-5 my-5 text-body-secondary border-top">
            Kelvin · © 2024
        </footer>
    </div>

    <script>

        document.addEventListener("DOMContentLoaded", () => {
            const inputsWrapper = document.getElementById("inputsWrapper");

            const fieldsToPreviewMap = {
                "heading": "previewHeading",
                "introLine": "previewIntroLine",
                "emailBody": "previewEmailBody",
                "outroLine": "previewOutroLine",
                "footerText": "previewFooterText",
                "subject": "previewSubject"
            };

            const updatePreview = (id, value) => {
                if (fieldsToPreviewMap[id]) {
                    document.getElementById(fieldsToPreviewMap[id]).innerHTML = value;
                }
            };

            const saveToLocalStorage = (id, value) => {
                localStorage.setItem(id, value);
            };

            // Handle input fields
            inputsWrapper.querySelectorAll("input, textarea").forEach((input) => {
                input.addEventListener("input", () => {
                    updatePreview(input.id, input.value);
                    saveToLocalStorage(input.id, input.value);
                });

                // Load from localStorage on page load
                const storedValue = localStorage.getItem(input.id);
                if (storedValue !== null) {
                    input.value = storedValue;
                    updatePreview(input.id, storedValue);
                }
            });

            // Handle contenteditable divs
            inputsWrapper.querySelectorAll("[contenteditable]").forEach((div) => {
                div.addEventListener("input", () => {
                    updatePreview(div.id, div.innerHTML);
                    saveToLocalStorage(div.id, div.innerHTML);
                });

                // Load from localStorage on page load
                const storedValue = localStorage.getItem(div.id);
                if (storedValue !== null) {
                    div.innerHTML = storedValue;
                    updatePreview(div.id, storedValue);
                }
            });

            // Show/hide reply settings
            const showReplyButton = document.getElementById("showReplyButton");
            const replySettings = document.getElementById("replySettings");
            const allowReplyToCurrentSubject = document.getElementById("allowReplyToCurrentSubject");
            const alternativeSubjectWrapper = document.getElementById("alternativeSubjectWrapper");

            showReplyButton.addEventListener("change", function () {
                replySettings.style.display = this.checked ? "block" : "none";
            });

            allowReplyToCurrentSubject.addEventListener("change", function () {
                alternativeSubjectWrapper.style.display = this.checked ? "block" : "none";
            });

            // Load reply settings state from localStorage
            if (localStorage.getItem("showReplyButton") === "true") {
                showReplyButton.checked = true;
                replySettings.style.display = "block";
            }

            if (localStorage.getItem("allowReplyToCurrentSubject") === "true") {
                allowReplyToCurrentSubject.checked = true;
                alternativeSubjectWrapper.style.display = "block";
            }

            // Save reply settings state to localStorage
            showReplyButton.addEventListener("change", function () {
                localStorage.setItem("showReplyButton", this.checked);
            });

            allowReplyToCurrentSubject.addEventListener("change", function () {
                localStorage.setItem("allowReplyToCurrentSubject", this.checked);
            });

            // Populate preview section on page load
            Object.keys(fieldsToPreviewMap).forEach(id => {
                const value = localStorage.getItem(id);
                if (value !== null) {
                    updatePreview(id, value);
                }
            });
        });





        document.addEventListener("DOMContentLoaded", () => {
            const wrapper = document.getElementById("inputsWrapper");
            const showReplyButton = document.getElementById("showReplyButton");
            const replySettings = document.getElementById("replySettings");
            const allowReplyToCurrentSubject = document.getElementById("allowReplyToCurrentSubject");
            const alternativeSubjectWrapper = document.getElementById("alternativeSubjectWrapper");

            // Toggle reply settings visibility
            showReplyButton.addEventListener("change", function () {
                replySettings.style.display = this.checked ? "block" : "none";
            });

            // Toggle alternative subject field visibility
            allowReplyToCurrentSubject.addEventListener("change", function () {
                alternativeSubjectWrapper.style.display = this.checked ? "block" : "none";
            });

            const submitButton = document.getElementById("submit");

            submitButton.addEventListener("click", (event) => {
                event.preventDefault(); // Prevent the default form submission behavior

                // Remove existing validation feedback
                wrapper.querySelectorAll(".invalid-tooltip").forEach(tooltip => {
                    tooltip.style.display = "none";
                });
                wrapper.querySelectorAll(".is-invalid").forEach(input => {
                    input.classList.remove("is-invalid");
                });

                const sendInfo = {};

                // Get the values of all input elements
                wrapper.querySelectorAll("input, textarea").forEach((input) => {
                    sendInfo[input.id] = input.value;
                });
                // Include HTML content of all contenteditable divs
                ["heading", "introLine", "emailBody", "outroLine", "footerText"].forEach(id => {
                    const element = document.getElementById(id);
                    if (element) {
                        sendInfo[id] = element.innerHTML;
                    }
                });

                // Send the sendInfo object using POST to send_mail.php as JSON
                fetch("send_mail.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(sendInfo)
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.required_inputs) {
                            data.required_inputs.forEach(field => {
                                const inputElement = document.getElementById(field);
                                const tooltip = inputElement.nextElementSibling;
                                inputElement.classList.add("is-invalid");
                                tooltip.style.display = "block";
                            });
                        } else {
                            alert("Form submitted successfully.");
                            // Optionally, reset the form or perform other actions upon successful submission
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
            });
        });


    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>