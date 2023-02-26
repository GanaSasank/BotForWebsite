<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div id="bot" class="fd">
  <div id="container">
    <div id="header">
        BOT
    </div>
    <div id="body">
    <div class="userSection">
          <div class="messages user-message">
            <body>
            (¬ ¬ )
            </body>
          </div>
          <div class="seperator"></div>
        </div>              
        <div class="botSection">
          <div class="messages bot-reply">
              <body>
                Welcome to the Bot Application !!!
              </body>
          </div>
          <div class="seperator"></div>
        </div>  
    </div>

    <div id="inputArea">
      <input type="text" name="messages" id="userInput" placeholder="Ask Query" required>
      <input type="submit" id="send" value="Send">
    </div>
  </div>
  </div>
    <input type="button" value="Help" id="b" onclick="dis()"></input>
</body>
<style>
    .fd{
        animation: fadeIn 1s ease-in forwards;
        /* animation-iteration-count: infinite; */
    }
    @keyframes fadeIn {
    from {
    opacity: 0; 
    }
    to {
    opacity: 1; 
    }
    }
    /* .fd {
    width: 100px;
    height: 100px;
    background-color: blue;
    animation: move .5s;
    }
    @keyframes move {
      100% {
      transform: translateX(300px);
      }
    } */
    #b{
    left: 26px;
    margin: 1px;
    height: 65px;
    width: 90px;
    border-radius: 10px;
    border-color: blue;
    background-color: blue;
    position: absolute;
    top: 816px;
    font-family: fantasy;
    font-style: inherit;
    color: white;
    }
    #bot {
    height: 500px;
    width: 283px;
    background: blue;
    display: none;
    align-items: center;
    justify-content: center;
    position: absolute;
    box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    top: 308px;
    left: 30px;
    }
    #container {
    height: 90%;
    border-radius: 10px;
    width: 90%;
    background: white;
    }
    .userSection {
  width: 100%;
}

/* Seperates user message from bot reply */
.seperator {
  width: 100%;
  height: 50px;
}

/* General styling for all messages */
.messages {
    max-width: 60%;
    margin: .5rem;
    font-size: 1.2rem;
    padding: .7rem;
    border-radius: 10px;
}

/* Targeted styling for just user messages */
.user-message {
    margin-top: 1rem;
    text-align: left;
    background: blue;
    color: white;
    float: left;
    display: flex;
}

/* Targeted styling for just bot messages */
.bot-reply {
    text-align: right;
    background: blue;
    margin-top: 1rem;
    float: right;
    color: white;
    font-family: fangsong;
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
}

/* Style the input area */
#inputArea {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 10%;
  padding: 1rem;
  background: transparent;
}

/* Style the text input */
#userInput {
  height: 20px;
  width: 80%;
  background-color: white;
  border-radius: 6px;
  padding: 1rem;
  font-size: 1rem;
  border: none;
  outline: none;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
}

/* Style send button */
#send {
    height: 50px;
    padding: .5rem;
    font-size: .85rem;
    text-align: center;
    width: 20%;
    color: white;
    background: blue;
    cursor: pointer;
    border: white;
    font-family: fangsong;
    border-radius: 5px;
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
}
#header {
    height: 10%;
    border-radius: 10px;
    background: white;
    color: blue;
    text-align: center;
    font-size: 2rem;
    font-family: fantasy;
    padding-top: 1px;
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
}

/* Style body */
#body {
    width: 100%;
    height: 75%;
    border-radius: 25px;
    /* background-color: white; */
    overflow-y: auto;
    background: rgb(225, 225, 225);
}
</style>


<script type="text/javascript">

// When send button gets clicked
document.querySelector("#send").addEventListener("click", async () => {

  // create new request object. get user message
  let xhr = new XMLHttpRequest();
  var userMessage = document.querySelector("#userInput").value


  // create html to hold user message. 
  let userHtml = '<div class="userSection">'+'<div class="messages user-message">'+userMessage+'</div>'+
  '<div class="seperator"></div>'+'</div>'


  // insert user message into the page
  document.querySelector('#body').innerHTML+= userHtml;

  // open a post request to server script. pass user message as parameter 
  xhr.open("POST", "dbaction.php");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(`messageValue=${userMessage}`);


  // When response is returned, get reply text into HTML and insert in page
  xhr.onload = function () {
      let botHtml = '<div class="botSection">'+'<div class="messages bot-reply">'+this.responseText+'</div>'+
      '<div class="seperator"></div>'+'</div>'

      document.querySelector('#body').innerHTML+= botHtml;
  }

})
const queryInput = document.getElementById('userInput');
const submitButton = document.getElementById('send');

submitButton.addEventListener('click', function(event) {
  // Prevent the form from submitting and reloading the page
  event.preventDefault();

  // Get the user's query
  const query = queryInput.value;

  // Clear the input field
  queryInput.value = '';

  // Process the user's query (e.g. send to server, display response, etc.)
  console.log('User query:', query);
});

function dis() {
    var n=document.getElementById("bot");
    if (n.style.display=="flex")
    {
        n.style.display="none";
        document.getElementById("b").value="Help";
    }
    else
    {
        n.style.display="flex";
        document.getElementById("b").value="Close";
    }
}

</script>




</html>
