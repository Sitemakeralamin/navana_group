<script src="{{asset('assets/Admin/assets/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/npm/%40fancyapps/ui%405.0/dist/fancybox/fancybox.umd.js')}}"></script>
    
    <script src="{{asset('assets/npm/swiper%4010.2.0/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/ajax/libs/modernizr/2.8.3/modernizr.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>


    <script src="{{asset('assets/js/signalr/dist/browser/signalr.js')}}"></script>
    

    <script src="{{asset('assets/js/popper.min.js')}}" defer></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}" defer></script>
    <script src="{{asset('assets/js/slick.min.js')}}" defer></script>
    <script src="{{asset('assets/js/lazyload.min.js')}}" defer></script>
    <script src="{{asset('assets/js/fancybox.min.js')}}" defer></script>
    <script src="{{asset('assets/js/wow.min.js')}}" defer></script>
    <script src="{{asset('assets/js/theme.js')}}" defer></script>
    <script src="{{asset('assets/js/site.js')}}" defer></script>

    <script>
      document.addEventListener("DOMContentLoaded", function(){
              $("#scheduleDate").on("change", function () {
              let z = n => ('0' + n).slice(-2);
              var d = new Date($(this).val());
              if (!isNaN(d)) {
                  var day = z(d.getDate());
                  var month = z(d.getMonth() + 1);
                  var year = d.getFullYear();
                  var formattedDate = `${day}/${month}/${year}`;
                  $("#displayscheduleDate").val(formattedDate);
              } else {
                  $("#displayscheduleDate").val('');
              }
          });
      } )
    </script>

    <script>

        function ProjectView() {

            $("#ProjectVbtn").trigger("click");
        }
        function HotelView() {
            $("#HotelVbtn").trigger("click");
        }
        function LandView() {
            $("#LandVbtn").trigger("click");
        }
        function ApartmentView() {
            $("#ApartmentVbtn").trigger("click");

        }
        function AEView() {
            $("#AEVbtn").trigger("click");

        }
        
        // mobile menubar 
        function set_sticky_menu_Index(index) {
            localStorage.setItem('activeIndex', index);
        }

        function load_sticky_menu() {
            const savedIndex = localStorage.getItem('activeIndex');
            if (savedIndex !== null) {
                $('.sticky-menu li').removeClass("active");
                $(`.sticky-menu li[data-index="${savedIndex}"]`).addClass("active");
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            load_sticky_menu();
        });
   
       
        document.addEventListener("DOMContentLoaded", function(){ 
            $(".side_envelope").hover(function () {
                $("#boxxyz").removeClass("testcl")
            });
        })
        
        $(document).ready(function () {
            var currentPath = window.location.pathname.split("/").pop();
            // alert(currentPath);
            // Remove any existing active menu styling classes first
            $(".navActiveMenu a").removeClass("MenuActive");


            if (currentPath=="project") {
                $(".navActiveMenu #menuLinkProject").addClass("MenuActive");
            }
            if (currentPath=="sunwave") {
                $(".navActiveMenu #menuLinkProject").addClass("MenuActive");
            }
            else if (currentPath=="aboutus") {
                $(".navActiveMenu #menuLinkAboutUs").addClass("MenuActive");
            }
            else if (currentPath=="project-detail") {
                $(".navActiveMenu #menuLinkBlogs").addClass("MenuActive");
            }
            else if (currentPath=="gallery") {
                $(".navActiveMenu #menuLinkCareer").addClass("MenuActive");
            }
            else if(currentPath=="contact") {
                $(".navActiveMenu #menuLinkContactUs").addClass("MenuActive");
            }
            else{
                $(".navActiveMenu #menuLinkHome").addClass("MenuActive");
            }

            var scrollTop = $(".scroll-top");
            $(window).scroll(function () {

                var topPos = $(this).scrollTop();
                if (topPos > 100) {
                    $(scrollTop).css("opacity", "1");
                }
                else {
                    $(scrollTop).css("opacity", "0");
                }

            });
            $(scrollTop).click(function () {
                $('html, body').animate({
                    scrollTop: 0
                }, 100);
                return false;

            });

            $("#scheduleSubmit").on("click", function () {
                saveClientInfomation();
            });
            $("#btnSubscribeDsk").on("click", function () {
                var emailOrMobileDsk = $("#txtEmailPhoneDsk").val();
                var emailOrMobileMo = $("#txtEmailPhoneMo").val();
                saveSubscribeInfomationDsk(emailOrMobileDsk, emailOrMobileMo);
            });
            $("#btnSubscribeMo").on("click", function () {
                var emailOrMobileDsk = $("#txtEmailPhoneDsk").val();
                var emailOrMobileMo = $("#txtEmailPhoneMo").val();
                saveSubscribeInfomationMo(emailOrMobileDsk, emailOrMobileMo);
            });
        });
        function saveSubscribeInfomationDsk(emailOrMobileDsk, emailOrMobileMo) {
            var formData = new FormData();
            formData.append("EmailPhoneDsk", emailOrMobileDsk);
            $.ajax({
                type: "Post",
                url: "/saveSubscribeInfoDsk",
                data: formData,
                contentType: false,
                processData: false,
                success: function (dt) {
                    if (dt.status == true) {
                        //window.confirm("You Successfully Subscribed.")

                        swal({
                            title: "Success",
                            text: dt.message,
                            type: "success"
                        }),
                            setTimeout(function () {
                                window.location.reload();
                            }, 5000);
                    }
                    else {

                        swal("Error!", dt.message, "error")
                    }
                },
                error: function (xhr, ajaxOption, throwError) {
                    return false;
                }
            });
        }
        function saveSubscribeInfomationMo(emailOrMobileDsk, emailOrMobileMo) {
            //alert(1);
            var formData = new FormData();
            formData.append("EmailPhoneMo", emailOrMobileMo);
            $.ajax({
                type: "Post",
                url: "/saveSubscribeInfoMo",
                data: formData,
                contentType: false,
                processData: false,
                success: function (dt) {
                    if (dt.status == true) {
                        //window.confirm("You Successfully Subscribed.")
                        swal({
                            title: "Success",
                            text: dt.message,
                            type: "success"
                        }),
                            setTimeout(function () {
                                window.location.reload();
                            }, 5000);
                    }
                    else {

                        swal("Error!", dt.message, "error")
                    }
                },
                error: function (xhr, ajaxOption, throwError) {
                    return false;
                }
            });
        }

        $(document).ready(function () {


            // Email pattern
            var emailPattern = /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;

            // Show email and validate on keypress
            $("#userEmail").on("keyup", function () {
                var email = $(this).val();

                // Check if the email matches the pattern
                if (emailPattern.test(email)) {
                    $("#emailValidError1").hide(); // Hide error if valid
                } else {
                    $("#emailValidError1").show(); // Show error if invalid
                }
            });
        });


        function saveClientInfomation() {

            var formData = new FormData();
            var name = $("#userName").val();
            var phone = $("#userPhone").val();
            var email = $("#userEmail").val();
            var branchName = $("#branchName").val();
            var scheduleTime = $("#scheduleTime").val();
            var scheduleDate = $("#displayscheduleDate").val();


            // Name validation
            if ($("#userName").val() == "") {
                $("#userName")
                    .css("border", "1px solid red")
                    .addClass("error-placeholder")
                    .attr("placeholder", "Name is Required")

                return false;
            } else {
                $("#userName").css("border", "").removeClass("error-placeholder");
            }


            // Email validation
            if (email == "") {
                $("#userEmail")
                    .css("border", "1px solid red")
                    .attr("placeholder", "Email is Required")
                    .addClass("error-placeholder");
                return false;
            } else {
                $("#userEmail").css("border", "").removeClass("error-placeholder");
            }

            // Phone validation
            if (phone == "") {
                $("#userPhone")
                    .css("border", "1px solid red")
                    .attr("placeholder", "Phone is Required")
                    .removeClass("error-placeholder");
                return false;
            } else {
                $("#userPhone").css("border", "").removeClass("error-placeholder");
            }

            var emailPattern = /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;

            if (!emailPattern.test(email)) {
                swal("Error", "The email format is not valid. Please enter a valid email.", "error");
                email.focus;
                return false;
            }

            // Phone validation
            if (phone == "" || phone == null || phone == undefined) {
                $("#userPhone")
                    .css("border", "1px solid red")
                    .attr("placeholder", "Phone is Required")
                    .removeClass("error-placeholder");
                return false;
            }
            else {
                $("#userPhone").css("border", "").removeClass("error-placeholder");
            }

            const error = document.getElementById("error");

            // Check if the input is a valid phone number (country code and digits)
            if (!/^\d+$/.test(phone)) {
                phoneValidError1.style.display = "block";
                phoneValidError1.textContent = "Please enter a valid phone number.";
                $("#userPhone").val(''); // Clear the input
                return false;
            } else {
                phoneValidError1.style.display = "none";
            }


            if (branchName == "" || branchName == 0) {
                return false;
            }
            if (scheduleTime == "") {
                $("#scheduleTime")
                    .css("border", "1px solid red")
                    .attr("placeholder", "Time is Required")
                    .removeClass("error-placeholder");
                return false;
            }
            else {
                $("#scheduleTime").css("border", "").removeClass("error-placeholder");
            }


            if (scheduleDate == "") {
                $("#scheduleDate")
                    .css("border", "1px solid red")
                    .attr("placeholder", "Date is required")
                    .removeClass("error-placeholder");
                return false;
            }
            else {
                $("#scheduleDate").css("border", "").removeClass("error-placeholder");
            }



            formData.append("name", name);
            formData.append("phone", phone);
            formData.append("email", email);
            formData.append("branchName", branchName);
            formData.append("scdTime", scheduleTime);
            formData.append("scdDate", scheduleDate);
            $.ajax({

                type: "Post",
                url: "/saveCustomerInfo",
                data: formData,
                contentType: false,
                processData: false,
                success: function (dt) {
                    if (dt.status == true) {

                        swal({
                            title: "Success",
                            text: data.message,
                            type: "success", 
                        },
                            function () {
                                window.location.reload();
                            });
                    }
                    else {

                        swal("Error!", dt.message, "error")
                    }
                },
                error: function (xhr, ajaxOption, throwError) {
                    return false;
                }
            });
        }
        // function brochureDownload(id){
            
        // }

        $(document).ready(function () {
             $("#SearchbtnClose").on("click", function () {
                $("#searchinput").val('');
                $("#divsearchresults").hide();
             });
            $("#SearchbtnMobClose").on("click", function () {
                $("#searchinputMob").val('');
                $("#divsearchresultsMob").hide();
            });


            $("#btnsearch-toggle").on("click", function () {
               $("#searchinput").focus();
            });

            $("#btnsearchMob-toggle").on("click", function () {
               $("#searchinputMob").focus();
            });

            $("#searchinput").on("keyup", function () {

                const query = $(this).val().toLowerCase();
                if(query == ""){
                    $("#divsearchresults").hide();
                    return false;
                }
                $.ajax({
                    type: "Get",
                    url: "/Home/Get_Search_Elements",
                    data: { query: query },
                    dataType: 'json',
                    success: function (dt) {
                        if (dt.status == true) {
                            $("#search-results").empty();
                            if (dt.result.length > 0) {
                                $.each(dt.result, function (i, item) {
                                    if (item.tbType == "Events") {
                                        $("#search-results").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                        $("#search-results").append(`<li class="subMenuli"><a href="/Event_Award_CSR/OngoingEvent?pglnk=${item.PgUrl}"  target="_blank">${item.filteredItems}</a></li>`);
                                    } 
                                    else if (item.tbType == "Blogs") {
                                         $("#search-results").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                        $("#search-results").append(`<li class="subMenuli"><a href="/NewsAndBlogs/Index?type=3&pglnk=${item.PgUrl}"  target="_blank">${item.filteredItems}</a></li>`);
                                    } 
                                    else if (item.tbType == "CSR") {
                                         $("#search-results").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                        $("#search-results").append(`<li class="subMenuli"><a href="/Event_Award_CSR/EventOverview/?evts=${item.PgUrl}"  target="_blank">${item.filteredItems}</a></li>`);
                                    }
                                    else if (item.tbType == "Awards") {
                                         $("#search-results").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                        $("#search-results").append(`<li class="subMenuli"><a href="/Event_Award_CSR/AwardDetails?pglnk=${item.PgUrl}"  target="_blank">${item.filteredItems}</a></li>`);
                                    }
                                    else if (item.tbType == "RewardBrands") {
                                         $("#search-results").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                        $("#search-results").append(`<li class="subMenuli"><a href="/Home/OfferDetails/?BrandUrl=${item.PgUrl}"  target="_blank">${item.filteredItems}</a></li>`);
                                    }
                                    else if (item.tbType == "Projects") {
                                         
                                        if (item.CategoryId == 1){
                                            $("#search-results").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                            $("#search-results").append(`<li class="subMenuli"><a href="/Projects/Hotel?ProjectTitle=${item.filteredItems}"  target="_blank">${item.filteredItems}</a></li>`);
                                        } 
                                        else if (item.CategoryId == 2) {
                                            $("#search-results").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                            $("#search-results").append(`<li class="subMenuli"><a href="/Projects/Land?ProjectTitle=${item.filteredItems}"  target="_blank">${item.filteredItems}</a></li>`);
                                        } 
                                        else if (item.CategoryId == 3) {
                                            $("#search-results").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                            $("#search-results").append(`<li class="subMenuli"><a href="/Projects/Appartment?ProjectTitle=${item.filteredItems}"  target="_blank">${item.filteredItems}</a></li>`);
                                        }
                                    }
                                });
                                $("#divsearchresults").show();
                            }
                            else {
                                $("#search-results").append(`<li class="subMenuli">No results found</li>`);
                                $("#divsearchresults").show();
                            }
                        }
                        else {

                            swal("Error!", dt.message, "error")
                        }
                    },
                    error: function (xhr, ajaxOption, throwError) {
                        return false;
                    }
                });

            });
            $("#searchinputMob").on("keyup", function () {

                const query = $(this).val().toLowerCase();
                if (query == "") {
                    $("#divsearchresultsMob").hide();
                    return false;
                }
                $.ajax({
                    type: "Get",
                    url: "/Home/Get_Search_Elements",
                    data: { query: query },
                    dataType: 'json',
                    success: function (dt) {
                        if (dt.status == true) {
                            $("#search-resultsMob").empty();
                            if (dt.result.length > 0) {
                                $.each(dt.result, function (i, item) {
                                    if (item.tbType == "Events") {
                                        $("#search-resultsMob").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                        $("#search-resultsMob").append(`<li class="subMenuli"><a href="/Event_Award_CSR/OngoingEvent?pglnk=${item.PgUrl}"  target="_blank">${item.filteredItems}</a></li>`);
                                    }
                                    else if (item.tbType == "Blogs") {
                                        $("#search-resultsMob").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                        $("#search-resultsMob").append(`<li class="subMenuli"><a href="/NewsAndBlogs/Index?type=3&pglnk=${item.PgUrl}"  target="_blank">${item.filteredItems}</a></li>`);
                                    }
                                    else if (item.tbType == "CSR") {
                                        $("#search-resultsMob").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                        $("#search-resultsMob").append(`<li class="subMenuli"><a href="/Event_Award_CSR/EventOverview/?evts=${item.PgUrl}"  target="_blank">${item.filteredItems}</a></li>`);
                                    }
                                    else if (item.tbType == "Awards") {
                                        $("#search-resultsMob").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                        $("#search-resultsMob").append(`<li class="subMenuli"><a href="/Event_Award_CSR/AwardDetails?pglnk=${item.PgUrl}"  target="_blank">${item.filteredItems}</a></li>`);
                                    }
                                    else if (item.tbType == "RewardBrands") {
                                        $("#search-resultsMob").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                        $("#search-resultsMob").append(`<li class="subMenuli"><a href="/Home/OfferDetails/?BrandUrl=${item.PgUrl}"  target="_blank">${item.filteredItems}</a></li>`);
                                    }
                                    else if (item.tbType == "Projects") {
                                        if (item.CategoryId == 1) {
                                            $("#search-resultsMob").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                            $("#search-resultsMob").append(`<li class="subMenuli"><a href="/Projects/Hotel?ProjectTitle=${item.filteredItems}"  target="_blank">${item.filteredItems}</a></li>`);
                                        }
                                        else if (item.CategoryId == 2) {
                                            $("#search-resultsMob").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                            $("#search-resultsMob").append(`<li class="subMenuli"><a href="/Projects/Land?ProjectTitle=${item.filteredItems}"  target="_blank">${item.filteredItems}</a></li>`);
                                        }
                                        else if (item.CategoryId == 3) {
                                            $("#search-resultsMob").append(`<li class="MainMenuli">${item.tbType}</li>`);
                                            $("#search-resultsMob").append(`<li class="subMenuli"><a href="/Projects/Appartment?ProjectTitle=${item.filteredItems}"  target="_blank">${item.filteredItems}</a></li>`);
                                        }
                                    }
                                });
                                $("#divsearchresultsMob").show();
                            }
                            else {
                                $("#search-resultsMob").append(`<li class="subMenuli">No results found</li>`);
                                $("#divsearchresultsMob").show();
                            }
                        }
                        else {

                            swal("Error!", dt.message, "error")
                        }
                    },
                    error: function (xhr, ajaxOption, throwError) {
                        return false;
                    }
                });

            });
        });
    </script>

    
    <!--End of Tawk.to Script-->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const widget = document.querySelector('widget-selector'); // Replace with actual widget selector

            if (widget && widget.shadowRoot) {
                const shadowRoot = widget.shadowRoot;

                // Check if the iframe elements exist before applying styles
                const iframe1 = shadowRoot.querySelector('iframe:first-child');
                const iframe2 = shadowRoot.querySelector('iframe:nth-child(2)');
                const iframe4 = shadowRoot.querySelector('iframe:nth-child(4)');

                if (iframe1) iframe1.style.setProperty('bottom', '76px', 'important');
                if (iframe2) iframe2.style.setProperty('bottom', '145px', 'important');
                if (iframe4) iframe4.style.setProperty('bottom', '85px', 'important');
            }
        });

    </script>
