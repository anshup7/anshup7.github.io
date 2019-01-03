var bio = {
    name: "Anshuman Upadhyay",
    role: "MEAN Stack Web Developer",
    contacts: {
        mob: "+91-9837125424",
        email: "anshumanupy@gmail.com",
        twitter: "https://goo.gl/NDGXGW",
        github: "https://goo.gl/fjq1Z1",
        blog: "https://goo.gl/2hB1Lj",
        location: "Pune(Maharashtra) India"
    },
    message: "Hi! Welcome to my profile. All details here are authentic and there is more to explore for you if you contact me!",

    skills: ["PHP", "AWS", "Python","Express", "Angular 4", "NodeJs", "Linux", "Perseverance", "Positive Thought Process", "Quick Learner and Ready to Unlearn!"],

    biopic: "./images/resimg.jpg",
    
//     awsLogo: "./images/AWS_Certified_Logo_294x230_Color.png"

    display: function () {

        //Forming the header of the resume here.

        $("#header").append(HTMLheaderName.replace("%data%", bio.name));
        $("#header").append(HTMLheaderRole.replace("%data%", bio.role));
//         $("#header").append(HTMLheaderAwsLogo.replace("%data%", bio.awsLogo));
        $("#header").append(HTMLbioPic.replace("%data%", bio.biopic));
        $("#header").append(HTMLwelcomeMsg.replace("%data%", bio.message));
        if (bio.skills.length > 0) {
            $("#header").append(HTMLskillsStart);

            bio.skills.forEach(function (skill) {
                $("#skills").append(HTMLskills.replace("%data%", skill));

            });
        }
        //Replacement for #Header Ends here.

        $("#topContacts").append(HTMLmobile.replace("%data%", bio.contacts.mob));
        $("#topContacts").append(HTMLemail.replace("%data%", bio.contacts.email));
        $("#topContacts").append(HTMLtwitter.replace("%data%", bio.contacts.twitter));
        $("#topContacts").append(HTMLgithub.replace("%data%", bio.contacts.github));
        $("#topContacts").append(HTMLblog.replace("%data%", bio.contacts.blog));
        $("#topContacts").append(HTMLlocation.replace("%data%", bio.contacts.location));

        $("#footerContacts").append(HTMLmobile.replace("%data%", bio.contacts.mob));
        $("#footerContacts").append(HTMLemail.replace("%data%", bio.contacts.email));
        $("#footerContacts").append(HTMLtwitter.replace("%data%", bio.contacts.twitter));
        $("#footerContacts").append(HTMLgithub.replace("%data%", bio.contacts.github));
        $("#footerContacts").append(HTMLblog.replace("%data%", bio.contacts.blog));
        $("#footerContacts").append(HTMLlocation.replace("%data%", bio.contacts.location));

    }
};

var education = {
    schools: [{
            name: "High School",
            degree: "N/A",
            date: "May 2011",
            location: "Guwahati(Assam) India",
            major: "N/A",
            url: "#"
        },
        {
            name: "Plus 2",
            degree: "N/A",
            date: "May 2013",
            location: "Ghaziabad(Uttar Pradesh) India",
            major: "Science",
            url: "https://www.stteresaschool.in/"
        },
        {
            name: "College",
            degree: "BTech.",
            date: "May 2017",
            location: "Mathura(Uttar Pradesh) India",
            major: "Computer Science",
            url: "http://gla.ac.in"
        }


    ],

    online_courses: [{
        title: "Front-end Web Developer",
        school: "Udacity",
        date: "In process",
        url: "https://goo.gl/1LxRCg"
    },

    {
        title: "Development with NodeJs",
        school: "Udemy",
        date: "In process",
        url: "https://goo.gl/f1m6G4"
    }
    ],

    display: function () {
        $("#education").append(HTMLschoolStart);
        education.schools.forEach(function (school) {
            $("#education").append((HTMLschoolName.replace("%data%", school.name)).replace("#", school.url));
            $("#education").append(HTMLschoolDegree.replace("%data%", school.degree));
            $("#education").append(HTMLschoolDates.replace("%data%", school.date));
            $("#education").append(HTMLschoolLocation.replace("%data%", school.location));
            $("#education").append(HTMLschoolMajor.replace("%data%", school.major));

        });
        $("#education").append(HTMLonlineClasses);
        education.online_courses.forEach(function (course) {
            $("#education").append(HTMLonlineTitle.replace("%data%", course.title));
            $("#education").append(HTMLonlineSchool.replace("%data%", course.school));
            $("#education").append(HTMLonlineDates.replace("%data%", course.date));
            $("#education").append((HTMLonlineURL.replace("%data%", '<i class="fa fa-link" aria-hidden="true"></i> To-Site')).replace("#", course.url));
        });
    }
};




var work = {
    jobs: [{
        employer: "Infosys Ltd.",
        title: "Systems Engineer",
        dates: "30-Jan-2018--Present",
        location: "Pune(Maharashtra) India.",
        description: "I have joined Infosys Pune after Mysore training.",
        url: "https://www.infosys.com/"
    }],

    display: function () {
        $("#workExperience").append(HTMLworkStart);
        work.jobs.forEach(function (job) {

            $("#workExperience").append((HTMLworkEmployer.replace("%data%", job.employer)).replace("#", job.url));
            $("#workExperience").append(HTMLworkTitle.replace("%data%", job.title));
            $("#workExperience").append(HTMLworkDates.replace("%data%", job.dates));
            $("#workExperience").append(HTMLworkLocation.replace("%data%", job.location));
            $("#workExperience").append(HTMLworkDescription.replace("%data%", job.description));

        });
    }
};

var project = {
    projects: [{
            title: "Event Managment System In CakePHP(GLAeMS)",
            dates: "September-2016 to May-2017",
            description: "This was the major project of my Btech Academics. The concept of this project was simply to enforce a single platform to facilitate the registration and conduction of various events that are being held in my college. Admin is required to add the Event poster and make event online from his account. The rest will be taken care by the system. Students can now register in these events and get an OTP through email which they have to show for their attendance at the event. The System also generates PDF-report of the Event. Other utility functions and modules are also implemented to foster the smooth functioning and credibility of this online system.",
            images: ["./images/ems/ems1.png", "./images/ems/ems2.png", "./images/ems/ems3.png", "./images/ems/ems4.png", "./images/ems/ems5.png", "./images/ems/ems6.png", "./images/ems/ems7.png", "./images/ems/ems8.png", "./images/ems/ems9.png", "./images/ems/ems10.png"],
            url: "https://goo.gl/hm1AbY"
        },
        {
            title: "Hostel Management System in PHP",
            dates: "Jan-2016 to May-2016",
            description: "This project was the first experience of mine in the field of full stack web developement. The concept  of the project was simple database manipulations but I learnt web development from this endeavour. I also had my hands dirty with Bootstrap framework and this framework's response with respect to the PHP script and AJAX(using core JS) pulled me in the Web development world",
            images: ["./images/hms/hms1.svg", "./images/hms/hms2.svg", "./images/hms/hms3.svg"],
            url: "https://goo.gl/X7aSVU"
        },
        {
            title: "Udacity Responsive Frontend Portfolio",
            dates: "July 2017",
            description: "There were certain glitches when it came to frontend design. That is why I decided to take the Front-end course at Udacity.This is the most favorite project of mine as far as designing of the web page is concerned. The main motive of coding here was to make this website visible on any device it is opened while taking the \"Good-Looks\" of this website into concern. &#128513;",
            images: [],
            url: "https://anshup7.github.io/portfolio/project/"
        }
    ],

    display: function () {
        $("#projects").append(HTMLprojectStart);
        var index = 0;
        project.projects.forEach(function (project) {
            index += 1;
            $("#projects").append("<div class='row' id='" + index + "'>");
            $("#" + index).append((HTMLprojectTitle.replace("%data%", project.title)).replace("#",project.url));

            $("#" + index).append(HTMLprojectDates.replace("%data%", project.dates));
            $("#" + index).append(HTMLprojectDescription.replace("%data%", project.description));
            project.images.forEach(function (url) {
                $("#" + index).append(HTMLprojectImage.replace("%data%", url));

            });

            $("#projects").append("</div>");

        });
    }
};




//Calling "Bio's" display() below;

bio.display();

//Calling "Work's" display() below;

work.display();

//Calling "Project's" display() below;
project.display();

//Calling "Education's" display() below;

education.display();

$("#mapDiv").append(googleMap);
$("#map").append(map);
