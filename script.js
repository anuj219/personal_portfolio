function loadData() {
    $.ajax({
        type: "GET",
        url: "projects.xml",
        dataType: "xml",
        success: function (xml) {
            let projects_arr = [];


            $(xml).find('projects').each(function () {
                let tech_arr = [];

                const title = $(this).find('title').text();    // innerText        
                const time = $(this).find('time').text();
                const desc = $(this).find('desc').text();
                const link = $(this).find('link').text();

                $(this).find('tech').each(function () {
                    const tech_name = $(this).text();
                    const perc = $(this).attr('perc');  // attr fetches the value of attribute of tech from the xml 
                    tech_arr.push({ tech_name, perc }); // THIS here, stands for the tech tag within a projects tag(outer THIS)

                });

                projects_arr.push({ title, time, desc, link, tech_arr });
            });

            projects_arr.forEach(i => {
                let content = `
                <a href="${i.link}" style="text-decoration:none; color:black;">
                    <div class="content-boxes" id="box1">
                        <div class="left1">
                            <p class="time1">${i.time}</p>
                            <div class="tech_title">Tech Stack </div>
                        </div>
                        <div class="right1">
                            <div class="title1" style="font-weight:bold;">${i.title}
                            </div>
                            <div class="desc1">${i.desc}
                            </div>
                        </div>
                    </div>
                </a>
                    `;
                content = $(content);
                i.tech_arr.forEach(z => {
                    content.find('.right1').append(`
                        <div class="main_tech">
                            <div class="tech">${z.tech_name}
                                <span class="bar" data="${z.perc}"></span>
                            </div>
                            <div class="percentage">${z.perc}%</div>
                        </div>
                        `)
                });
                $('.content1').append(content);
            });

            // Event delegation for dynamic elements
            $('.content-boxes').on('mouseenter', function () {
                // Dim all non-hovered boxes
                $('.content-boxes').css('opacity', '0.5');
                $(this).css('opacity', '1');
                $(this).find('.percentage').css({'opacity': '0.6'});

                // Fill the bars to their respective percentages
                $('.tech').find('.bar').css({ 'width': '0px' });
                $(this).find('.tech').each(function () {
                    // this here, stands for a hovered content box
                    let perc = $(this).find('.bar').attr('data'); // Get the percentage from data attribute
                    $(this).find('.bar').css({ 'width': perc}); // Directly apply the percentage
                    $(this).css({'background-color':'transparent', 'color':'white'});
                });
            }).on('mouseleave', function () {
                // Reset opacity for all content boxes
                $('.content-boxes').css('opacity', '1');
                $(this).find('.bar').css({ 'width': '0px'});
                $(this).find('.tech').css({'color':'black'});
                $(this).find('.percentage').css({'opacity': '0'});
            });

            // window.addEventListener('scroll', function() {
            //     var navbar = document.getElementById('navbar');
                
            //     // Check if page is scrolled more than 100px
            //     if (window.scrollY > 30) {
            //         navbar.classList.add('shrink'); // Add the 'shrink' class
            //     } else {
            //         navbar.classList.remove('shrink'); // Remove the 'shrink' class
            //     }
            // });

            // vanilla JS vs JQUERY 
            // important !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            $(window).on('scroll', function() {  //converted window to a Jquery DOM object
                if ($(this).scrollTop() > 30) {     //checks if page is scrolled more than 30px|| scrollTop is jquery function
                    $('#navbar').addClass('shrink');
                    $('#up').css('display','block');
                } else {
                    $('#navbar').removeClass('shrink');
                    $('#up').css('display','none');
                }
            });
            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error: " + textStatus + " " + errorThrown);
            console.log(jqXHR.responseText); // Log the server response, if any.
            // chagpt code
        }
    });
};

$(document).ready(function () {
    $('#menu-links')
    loadData();
});
