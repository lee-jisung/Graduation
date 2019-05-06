pragma solidity ^0.4.25;

/**
 * @title SafeMath
 * @dev Math operations with safety checks that throw on error
 */
library SafeMath {

  /**
  * @dev Multiplies two numbers, throws on overflow.
  */
  function mul(uint256 a, uint256 b) internal pure returns (uint256) {
    if (a == 0) {
      return 0;
    }
    uint256 c = a * b;
    assert(c / a == b);
    return c;
  }

  /**
  * @dev Integer division of two numbers, truncating the quotient.
  */
  function div(uint256 a, uint256 b) internal pure returns (uint256) {
    // assert(b > 0); // Solidity automatically throws when dividing by 0
    uint256 c = a / b;
    // assert(a == b * c + a % b); // There is no case in which this doesn't hold
    return c;
  }

  /**
  * @dev Substracts two numbers, throws on overflow (i.e. if subtrahend is greater than minuend).
  */
  function sub(uint256 a, uint256 b) internal pure returns (uint256) {
    assert(b <= a);
    return a - b;
  }

  /**
  * @dev Adds two numbers, throws on overflow.
  */
  function add(uint256 a, uint256 b) internal pure returns (uint256) {
    uint256 c = a + b;
    assert(c >= a);
    return c;
  }
}

/**
 * @title MultiOwnable
 */
contract MultiOwnable {
    address public root;
    mapping (address => address) public owners; // owner => parent of owner
    
    /**
    * @dev The Ownable constructor sets the original `owner` of the contract to the sender
    * account.
    */
    constructor() public {
        root= msg.sender;
        owners[root]= root;
    }
    
    /**
    * @dev Throws if called by any account other than the owner.
    */
    modifier onlyOwner() {
        require(owners[msg.sender] != 0);
        _;
    }
    
    /**
    * @dev Adding new owners
    */
    function newOwner(address _owner) onlyOwner public returns (bool) {
        require(_owner != 0);
        owners[_owner]= msg.sender;
        return true;
    }
    
    /**
     * @dev Deleting owners
     */
    function deleteOwner(address _owner) onlyOwner public returns (bool) {
        require(owners[_owner] == msg.sender || (owners[_owner] != 0 && msg.sender == root));
        owners[_owner]= 0;
        return true;
    }
}

contract Member is MultiOwnable{
    
    reviews[] public Reviews;
    mapping(address => address) etherAddr;
    mapping(address => uint8) userType;
    mapping(address => uint256) evaluatedValue;
    mapping(address => uint256) evaluatedTimes; 
        mapping(address => uint256) evaluateCount;
    
    uint256 totalMember=0;
    uint256 adminCnt=0;
    uint256 hostCnt=0;
    uint256 guestCnt=0;
    
    struct reviews {
        address writer;  
        address recipient;
        string review;
        string score;
    }
    
    function firstJoin(address _etherAddr, uint8 _userType, uint256 _evaluatedValue, uint256 _evaluatedTimes, uint256 _evaluateCount) public onlyOwner {
        etherAddr[_etherAddr]=_etherAddr;
        userType[_etherAddr]=_userType;
        evaluatedValue[_etherAddr]=_evaluatedValue;
        evaluatedTimes[_etherAddr]=_evaluatedTimes;
        evaluateCount[_etherAddr]=_evaluateCount;
        totalMember++;
        if(_userType == 1){
            guestCnt++;
        }else if(_userType==2){
            hostCnt++;
        }else{
            adminCnt++;
        }
    }
    
    function getAddress(address _etherAddr) view public onlyOwner returns (address){
        return etherAddr[_etherAddr];
    }
    
    function getTotalMember() view public onlyOwner returns (uint){
        return totalMember;
    }
    
    function getHostMember() view public onlyOwner returns (uint){
        return hostCnt;
    }
    
    function getGuestMember() view public onlyOwner returns (uint){
        return guestCnt;
    }
    
    function getEvaluatedTimes(address _etherAddr) view public onlyOwner returns(uint) {
        return evaluatedTimes[_etherAddr];
    }
    
    function getEvaluateCount(address _etherAddr) view public onlyOwner returns (uint){
        return evaluateCount[_etherAddr];
    }
    
    function getEvaluatedValue(address _etherAddr) view public onlyOwner returns (uint){
        return evaluatedValue[_etherAddr];
    }
    
    function getScore(address _etherAddr, uint8 _index) view public onlyOwner returns(string){
        require(_index <= Reviews.length);
        if(Reviews[_index].recipient == _etherAddr){
            return Reviews[_index].score;
        }
    }
    
    function getReviews(address _etherAddr, uint8 _index) view public onlyOwner returns(string){
           require(_index <= Reviews.length);
              if(Reviews[_index].recipient == _etherAddr){
                return Reviews[_index].review;
            }
            //if(keccak256(abi.encodePacked(Reviews[i].recipient)) == keccak256(abi.encodePacked(_etherAddr))){
    }

    
    function setReviews(address _writer, address _recipient, string _review, uint256 _evaluatedValue, string _score) public onlyOwner{
        Reviews.push(
            reviews({
                writer: _writer,
                recipient: _recipient,
                review: _review,
                score: _score
            })
        );
        evaluateCount[_writer]++;
        evaluatedValue[_recipient] += _evaluatedValue;
        evaluatedTimes[_recipient] ++;
    }

    
    
}

contract ShareBZ is MultiOwnable, Member {
    using SafeMath for uint256;
    
    string public constant name = 'ShareBZ';
    string public constant symbol = 'SBZ';
    uint8 public constant decimals = 18;
    uint public constant INITIAL_SUPPLY = 1000 * (10 ** uint256(decimals)); 
    uint public totalsupply;
    
    mapping(address => uint256) public balances;
    mapping(address => int8) public blackList;
    
    event Transfer(address indexed from, address indexed to, uint value);
    event Blacklisted(address indexed target);
    event DeleteFromBlacklist(address indexed target);
    event RejectedPaymentToBlacklistedAddr(address indexed from, address indexed to, uint value);
    event RejectedPaymentFromBlacklistedAddr(address indexed from, address indexed to, uint value);

    
    constructor () public {
        totalsupply = INITIAL_SUPPLY;
        balances[msg.sender] = INITIAL_SUPPLY;
        root = msg.sender;
    }
    
    function getTotalSupply() public view returns(uint){
        return totalsupply;
    }
    
    function balanceOf(address _owner) public view returns (uint256){
        return balances[_owner];
    }
    
    function blacklisting(address _addr) public onlyOwner{
        blackList[_addr] = 1;
        emit Blacklisted(_addr);
    }
    
    function deleteFromBlacklist(address _addr) public onlyOwner{
        blackList[_addr] = 0;
        emit DeleteFromBlacklist(_addr);
    }
    
    function transfer(address _to, uint256 _value) public returns (bool) {
      require(_to != address(0));
      require(_value <= balances[msg.sender]);

      if(blackList[msg.sender] >0){
         emit RejectedPaymentFromBlacklistedAddr(msg.sender, _to, _value);
      } else if(blackList[_to] > 0) {
          emit RejectedPaymentToBlacklistedAddr(msg.sender, _to, _value);
      } else{
          balances[msg.sender] = balances[msg.sender].sub(_value);
          balances[_to] = balances[_to].add(_value);    
          emit Transfer(msg.sender, _to, _value);
          return true;
      }
  }

}
