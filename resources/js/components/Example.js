import '../../../node_modules/bootstrap/dist/css/bootstrap.min.css'
import React, { useState,useEffect } from 'react';
import ReactDOM from 'react-dom';
import '../../css/app.css'
import Home from './Home'
import Car from './Car'
import firebase  from '../../firebase/firebaseConfig';
import Login from './Login';
import axios from 'axios';

function Example() {

   

  const [user,setUser] = useState("");
  const [email,setEmail] = useState("");
  const [password,setPassword] = useState("");
  const [emailError,setEmailError] = useState("");
  const [passwordError,setPasswordError] = useState("");
  const [hasAccount,setAccount] = useState(false);

  const clearInputs = () => {
    setEmail("");
    setPassword("");
  }
   
  const clearErrors = () => {
    setPasswordError("");
    setEmailError("");
  }
   
//iniciar sesión
  const handleLogin = () => {
    clearErrors();
    firebase.auth().signInWithEmailAndPassword(email,password)
    .catch((err)=> {
      switch (err.code){
        case "auth/invalid-email":
        case "auth/user-disabled":
        case "auth/user-not-found":
          setEmailError("El correo no existe");
          break;
          case "auth/wrong-password":
            setPasswordError("La contraseña es incorrecta");
            break;
      }
    });
  };
//crear cuenta
  const handleSingup = () => {
    clearErrors();

    firebase.auth().createUserWithEmailAndPassword(email,password)
    .catch((err)=>{
      switch (err.code){
        case "auth/email-already-in-use":
          case "auth/invalid-email":
            setEmailError("El correo ya existe");
            break;
        case "auth/weak-password":
          setPasswordError("La contraseña es incorrecto debe ser mayor a 6");
          break;
      }
    }
    )
  /*   const data = {
      name:user,
      email:email,
      password:password

    } */

/*     var bodyFormData = new FormData();
    bodyFormData.append('name', user);
    bodyFormData.append('email', email);
    bodyFormData.append('password', password); */

    
/* 
    let data = JSON.stringify({
      name:user,
      email:email,
      password:password
    });

  
    console.log(data);
    let id_producto= 1; */

     /*    axios({
    method: 'post',
    url: '/crearUsuario',
    data:{
      name:user,
      email:email,
      password:password
    }
    })
    .then(function (response) {
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    });   */

  /*    axios.post('/crearUsuario',
     {headers:{"Content-Type" : "application/json"}},
    { params: {data }})
    .then(res =>{
      console.log(res);
    }).catch(err => {
      console.log(err.message);
    })
  */

   // const response = axios.post("/crearUsuario",data,{headers:{"Content-Type" : "application/json"}});

 

/*      axios.post('/crearUsuario',{"Content-Type" : "application/json"},{ params: {
      data
    }}).then(res =>{
      console.log(res.data);
    }).catch(err => {
      console.log(err);
    })   */
    
  }

  const handleLogout = () => {
    firebase.auth().signOut();
    clearInputs();
  };

  const authListener = () => {
    firebase.auth().onAuthStateChanged((user)=>{
      if (user) {
        clearInputs();
        setUser(user);
      }else{
        setUser("");
      }
    });
  };

  useEffect(()=>{
    authListener();
  },[]);
   

  return (

    <div className="example">
      {user ? (
          <div>
            <div> <button onClick={handleLogout}>Cerrar sesión</button></div>
            <Home user = {user}/>
            <Car user = {user}/>
          </div>
      ):(
        <Login email={email}
        setEmail={setEmail}
         password={password} 
         setPassword={setPassword}
         handleLogin={handleLogin}
         handleSingup={handleSingup}
         hasAccount={hasAccount}
         setAccount={setAccount}
         emailError={emailError}
         passwordError={passwordError}/>
      )}
    </div>

  );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
