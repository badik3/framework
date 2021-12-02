function addUser()
{
    $username = document.getElementById("user-name").value;
    $password = document.getElementById("password").value;
    $confirmPassword = document.getElementById("confirm-password").value;

    if ($password.length > 6 && $username.length > 2)
    {
        if ($password == $confirmPassword) {
            console.log($password);
            console.log($username);
            $.ajax({
                type: "POST",
                url: "http://localhost/framework/?c=auth&a=novyLogin",
                data: {
                    username: $username,
                    password: $password,
                    confirmPassword: $confirmPassword
                }
            })
                .done((data) => {
                    if (data == 0) {
                        alert('Meno už existuje');
                    }
                    else {

                        alert('Účet bol vytvorený');

                    }

                })

                .fail(function () {
                    console.log("nic sa nestalo :'(");
                });
        }
        else
        {
            alert("Heslá sa nezhodujú");
        }
    }
    else
    {
        alert('Heslo musí mať aspoň 7 znakov a meno viac ako 2!');
    }

};