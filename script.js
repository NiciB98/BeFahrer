// Unten steht bis Zeile 19, wie das Hamburger Menu animiert wurde.
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", () => 
{
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");

})

document.querySelectorAll(".nav-link").forEach(n => n.
    addEventListener("click", () => 
    {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");

    }))

function updateTextInput(val) 
{
    document.getElementById('textInput').value=val; 
}

// ^^^^^^^^^^^^^^^^^^^^^^^^^^ Hamburger ^^^^^^^^^^^^^^^^^^^^^^^^^^

holeUser();

function holeUser()
{
    
    let userID = localStorage.getItem('userID');
    let token = localStorage.getItem('userToken');

    let formData = new FormData();
    formData.append('userID', userID);
    
    fetch('https://753574-2.web.fhgr.ch/php/holeUser.php',
    {
        body: formData,
        method: 'post',
        headers: 
        {
            'Authorization': 'Basic ' + btoa(userID + ':' + token),
        }
    })

    .then((res) =>
    {
        //goes into this
        if(res.status >= 200 && res.status < 300) 
        {
            return res.json();
        }
        else
        {
            alert("Bitte melden Sie sich erneut an");
            window.location = '/login.html';
        }
    })
    .then((data) =>
    {
        //does not go into this / give error
        console.log("before holeUser.php");
        console.log(data[0].Username);
        document.querySelector("#Username").innerHTML = data[0].Username;
    })
}