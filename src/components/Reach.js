import React, { Component } from 'react'
import { Container, Row, Col } from 'react-bootstrap';
import { FaCar, FaRegHandshake, FaUsers } from 'react-icons/fa';

class Reach extends Component {
    interval
    constructor(props) {
        super(props)
    
        this.state = {
             clients: 0,
             transactions : 0,
             cars: 0
        }

        this.reachRef = React.createRef()
    }

            getCounter = (counter) => {
            let count = Math.floor(counter / 100)
            let value = 0
            switch(true){
            case (count <= 10) :
            value = 10
            break;
            case (count <= 100) :
            value = 100
            break;
            case (count <= 1000) :
            value = 1000
            break;
            default:
            value = 1
            }
            return value;
            }


    componentDidMount(){
        window.addEventListener('scroll', this.scrollHandle, { passive: true })
    }
    componentDidUpdate(){
        //this.increment(this.state.clients, 20) 
    }


    scrollHandle = () => {
        let reachSection = this.reachRef.current.offsetTop - 200,
        scrollWin = window.scrollY
        if((scrollWin >= reachSection)){
            this.interval = setInterval(() => {
                this.incrementClients(this.state.clients, 2500) 
                this.incrementCars(this.state.cars, 70000) 
                this.incrementTransactions(this.state.transactions, 17000) 
            }, 100)
        }
      } 

    roundShort(number) {
        if(number > 1000){
            let newNumber = Math.abs(number / 1000)
            newNumber = newNumber + 'K+'
            return newNumber
        }
    }

     incrementClients = (stated, stateValue) =>{
         let value = this.getCounter(stateValue)
         if (stateValue > stated) {
            this.setState({
                clients:  stated + value
                }, () => {})  
         }
    }
    incrementCars = (stated, stateValue) =>{
        let value = this.getCounter(stateValue)
        if (stateValue > stated) {
        this.setState({
        cars:  stated + value
        }, () => {})
    }
}

incrementTransactions = (stated, stateValue) =>{
    let value = this.getCounter(stateValue)
    if (stateValue > stated) {
    this.setState({
    transactions:  stated + value
    }, () => {})
}
}

    componentWillUnmount(){
        clearInterval(this.interval)
        window.removeEventListener('scroll', this.scrollHandle)
    }
    
    render() {
        return (
            <div className="reachSection" ref={this.reachRef}>
                <Container>
<Row>
<Col md={4} xs={12} sm={6}>
<FaCar  size={80}/>
        <h3>{this.roundShort(this.state.cars)}</h3>
        <h4>Cars Bought</h4>
</Col>
<Col md={4} xs={12} sm={6}>
    <FaRegHandshake  size={80}/>
<h3>{this.roundShort(this.state.transactions)}</h3>
        <h4>Successful Transactions</h4> 
</Col>
<Col md={4} xs={12} sm={6}>
    <FaUsers size={80}/>
<h3>{this.roundShort(this.state.clients)}</h3>
        <h4>Clients</h4>
</Col>
</Row>
</Container>
            </div>
        )
    }
}

export default Reach
