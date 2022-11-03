
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href=".css">
</head>
<body>
  <div>
    <img src="images/eva1.jpg" alt="" style=" width: 100%; height: 250px;object-fit: cover;">
</div>
  <div class="container w-50 p-3 col-md-5 mb-8">
  <h1>FORMULAIRE D'INSCRIPTION</h1>
    <form id="form" action="../traitement/traitement.php" method="POST" class="row g-3 d-flex justify-content-center no-wrap m-2 bg-light" >
       
        <div class="col-md-6">
        <div class="input-control">
            <label for="username">Prenom</label>
            <input id="prenom" class=" p-3 rounded-0" name="prenom" type="text">
            <p class="error"></p>
        </div>
        </div>
        <div class="col-md-6">
        <div class="input-control">
          <label for="username">Nom</label>
          <input id="nom" name="nom"  class=" p-3 rounded-0" type="text">
          <p class="error"></p>
          </div>
      </div>
      <div class="col-md-6">
        <div class="input-control">
            <label for="email">Email</label>
            <input id="email" name="email" class=" p-3 rounded-0" type="email">
            <p class="error"></p>
            </div>
        </div>
        <div class="col-md-6">
        <div class="input-control">
            <label for="email">Role</label>
            <select id="role" name="roles"  class="form-select p-3 rounded-0">
              <option value=""></option>
              <option value="Administrateur">Admin</option>
              <option value="Utilisateur">Utilisateur</option>
            </select>
            <p class="error"></p>
            </div>
        </div>
        <div class="col-md-6">
        <div class="input-control">
            <label for="password">Password</label>
            <input id="password"name="password"  class=" p-3 rounded-0" type="password">
            <p class="error"></p>
        </div>
        </div>
        <div class="col-md-6">
        <div class="input-control">
            <label for="password2">Password again</label>
            <input id="password2" name="password2"  class=" p-3 rounded-0" type="password">
            <p class="error"></p>
            </div>
            <div class="col-md-6">
        <div class="input-control">
            <!-- <label for="avatar" class="form-label"> Photo</label>
            <input type="file" name="photo"  class=" p-3 rounded-0">
            <div class="error"></div>
            </div> -->
            <label for="avatar"></label>
             <input type="file"
               id="photo" name="photo"
                  accept="image/png, image/jpeg">

                 </div>
                  <button type="submit" name="submit" id="button">Connexion</button>
        
    </form>
</div>

    
  <script src="../javascript/inscript.js"></script>
    
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
<style>
#form{
  width: 100%;
 /*  margin: 30vh auto 0 auto;
  padding: 20px;
  background-color: whitesmoke;
  border-radius: 4px;
  font-size: 12px; */
  display: flex;
  justify-content: center; 
}
#email{
    height: 50px;
    width: 100%;
    font-size: 85%;
}
#password{
    height: 50px;
    width: 100%;
    font-size: 85%;
}
#button{
    height: 50px;
    width: 300px;
    background-color: blue;
    border-radius: 10px;
   
}

.input-control .error {
  color: #ff3860;
  font-size: 20px;
  height: 13px;
}
#prenom{
    height: 50px;
    width: 100%;
    font-size: 85%;
}
#nom{
    height: 50px;
    width: 100%;
    font-size: 85%;
} #role{
    height: 50px;
    width: 100%;
    font-size: 85%;
}
#password2{
    height: 50px;
    width: 100%;
    font-size: 85%;
}
h1 {
  color: #0f2027;
  text-align: center;
  font-size: 35px;
 /*  margin-left: 12px; */
}
label{
    font-size: 25px;  
}#photo{
  height: 50px;
    width: 100%;
    font-size: 100%;
    margin-right: 102px;
}


</style>
</html>
