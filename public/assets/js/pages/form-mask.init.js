var DateStyle1=document.getElementById("input-date1"),im=new Inputmask("dd/mm/yyyy"),DateStyle2=(im.mask(DateStyle1),document.getElementById("input-date2")),DateTime=((im=new Inputmask("mm/dd/yyyy")).mask(DateStyle2),document.getElementById("input-datetime")),currency=((im=new Inputmask("yyyy-mm-ddHH:MM:ss")).mask(DateTime),document.getElementById("input-currency")),ipSelector=((im=new Inputmask("yyyy-mm-dd'T'HH:MM:ss")).mask(currency),document.getElementById("input-ip")),emailSelector=((im=new Inputmask("99.99.99.99")).mask(ipSelector),document.getElementById("input-email")),repeatSelector=((im=new Inputmask("_@_._")).mask(emailSelector),document.getElementById("input-repeat")),selector=((im=new Inputmask("9999999999")).mask(repeatSelector),document.getElementById("input-mask"));(im=new Inputmask("99-9999999")).mask(selector);