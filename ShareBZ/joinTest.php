<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sample App</title>
<link href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://v4-alpha.getbootstrap.com/examples/narrow-jumbotron/narrow-jumbotron.css" rel="stylesheet">
 </head>
<body>
    <div class="container"> 	
      <div class="header clearfix">
        <h3 class="text-muted">Add Members</h3>
      </div>
<!-- to display the count of total books -->
      <div id="info" class="alert alert-info"></div>
      <div id="info2" class="alert alert-info"></div>
      <div id="info3" class="alert alert-info"></div>
      <div id="blockNumber" class="alert alert-info"></div>
      <div id="balance" class="alert alert-info"></div>
      
      
      <div id="totalSupply" class="alert alert-info"></div>
<!-- form to get title, author and language of the book -->
      <form>
        <div class="form-group">
          <label for="userType">userType</label>
          <input id = userType type="text" class="form-control" placeholder="0:admin/1:provider/2:user">        
        </div>
        <button type="submit" class="btn btn-primary" id="button">Update</button>
      </form>
          <label for="Eavluation">Evaluation</label>
          <input id = index type="text" class="form-control" placeholder=index>
          <input id = evalue type="text" class="form-control" placeholder=point>
          <input type='button' id=setting value=setting class="btn btn-primary">
          
       <div>
          <label for="Transfer">Transfer</label>
          <input id = to type="text" class="form-control" placeholder=address >
          <input id = value type="text" class="form-control" placeholder=ether>
          <input type='button' id=transfer value=Transfer class="btn btn-primary">
          
       </div>
       
       <div>
          <label for="BlackList">BlackList</label>
          <input id = addr type="text" class="form-control" placeholder=address >
          <input type='button' id=add value=Add class="btn btn-primary">
          <input type='button' id=delete value=Delete class="btn btn-primary">
       </div>
          
    </div>
    
    
  </body>
   <!-- including web3.js from node_modules -->
<script src="https://cdn.rawgit.com/ethereum/web3.js/develop/dist/web3.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript' src='./sharebzAbi.js'></script> <!-- ABI include -->
<script>

    var n1=0, n2=0, n3=0;

    if (typeof web3 !== 'undefined') {
        web3 = new Web3(web3.currentProvider);
      } else {
        web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
      };

      //sets a default account to communicate from the 10 accounts given by ganache-cli
      //>> web3.eth.defaultAccount = web3.eth.accounts[0];
      
      // need to get the ABI from smart contract and paste
      var shareBZContract = web3.eth.contract(shareBZABI);
      // need to get the smart contract address and paste
      var shareBZ = shareBZContract.at('0xc5bd7b208f4c1f0c1c7bd75671c9d946ae2b8298');
// access getBooksCount and update the html with the count
//     members.getMembersNumber(function(err, result){
//     if(!err)
//       $("#info").html("<strong>Evaluated Number:</strong> " + result);
//     });

  // get block number from solidity
	web3.eth.getBlockNumber(function(e,r){
	    $("#blockNumber").html("<strong>Block Number: </strong>" + r);
	  });
	  
    shareBZ.getEvaluVal(1, function(err, result){
        if(!err)
          $("#info").html("<strong>Evaluated Value:</strong> " + result);
        });

    shareBZ.getEvaluNum(1, function(err, result){
        if(!err)
          $("#info2").html("<strong>Evaluated Number:</strong> " + result);
        });

    shareBZ.getMembersNumber(function(err, result){
        if(!err)
          $("#info3").html("<strong>Members number:</strong> " + result);
        });

    shareBZ.getTotalSupply(function(err, result){
        if(!err)
          $("#totalSupply").html("<strong>Total Supply:</strong> " + result);
        });

    shareBZ.balanceOf('0x9339052e83FE8099c5A19bA2493E4993b41e661A',function(err, result){
        if(!err)
          $("#balance").html("<strong>balance:</strong> " + result);
        });
    
// access setBook on Update button click to set the book details in the contract
    $("#button").click(function() {
    	shareBZ.pushStatus($("#userType").val(), n1, n2, n3, function(e,r){
            if(!e){
                console.log(r);
            }
            else
                console.log(e);
            });
       });

    $("#setting").click(function(){
    	shareBZ.setEvalu(document.getElementById('index').value, document.getElementById('evalue').value, function(e,r){
            if(!e){
                console.log(r);
            }
        });
    });

    $("#transfer").click(function(){
    	shareBZ.transfer(document.getElementById('to').value, document.getElementById('value').value, function(e,r){
            if(!e){
                console.log(r);
            }
        });
    });

    $("#add").click(function(){
    	shareBZ.blacklisting(document.getElementById('addr').value, function(e,r){
            if(!e)
                console.log(r);
            else console.log(e);
            });
    });
	
    $("#delete").click(function(){
    	web3.eth.sendTransaction({from:'0x9339052e83FE8099c5A19bA2493E4993b41e661A', to:'0xB9e6c03a91Fe568825BEbA8fC840733158add08b', value: web3.toWei(1, "ether")}, 
    	    	  function(e, r){
	    	  if(!e){console.log(r);}
	    	  else console.log(e);
        	});
    });
  </script>
</html>