/*
 var zipCode = "37919";
 var clientKeyJs = "js-WT0k29FD4av1VcIhRv0XvT9O2AhYU4xQXyb0HQDM19OWmwed2ebx7lmaVD8PIGGG";
 var clientKey = "RgE9NdPpNWrz9KgpDcKVQCiFG85MM4qDk5N7jCx6zZGIJW7n8SiZuAEbIJXvOo98";
 var apiURL = "https://www.zipcodeapi.com/rest/" + clientKeyJs + "/radius.json/" + zipCode + "/50/mile";
 */


function getCustomerZip() {
    var zipInput = document.getElementById("zipInput");
    var zipFormSubmit = document.getElementById("zipFormSubmit");
    var theForm = document.getElementById("theForm");
    console.log(zipInput);
    zipFormSubmit.addEventListener("click", function () {
        var customerZip = zipInput.value;
        isZipInServiceArea(customerZip);
        console.log(customerZip);
    });
}
function isZipInServiceArea(customerZip) {
    console.log("Is the Customer in the service area?");
    //			console.log(customerZip);
    //			console.log(theZipCodes);
    if (SERVICE_AREA_ZIPS.zips.indexOf(customerZip) > -1) {
        console.log("YUP!");
        theForm.classList.add("true");
    }
    else {
        console.log("NOOOPE!")
    }
}
getCustomerZip();