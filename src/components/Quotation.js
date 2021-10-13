import React, { Component } from 'react'
import axios from 'axios'
import { Button,  Container, Row, Col, Form } from 'react-bootstrap'
import Offer from './Offer'
import { ImCheckmark } from 'react-icons/im'
import InfoModal from './InfoModal'

 class Quotation extends Component {
   constructor(props) {
     super(props)
     this.state = {
      carYear: '',
      carName: '',
      carModel: '',
      nextForm: true,
      checker: false, 
      monitor: 0, 
      carNameList: [],
      carModelList: [],
      openModal: false
     }
     this.years = []
     for (let i = new Date().getFullYear(); i > 1959; i--){
       this.years.push(i)
     }

    this.opts = this.years.map((year, index) => <option key={index} value={year}>{year}</option>)
    this.sendURL = '//localhost/fljc/fe/feRequest.php';
   }

   componentDidMount(){
 
   }


   getCarNames = (name, value) =>{
    console.log(`Get: ${value}`)
    if(name === 'carYear'){
     axios.get(this.sendURL, {
      params: {
          value,
          send: 'Get Car Brands'
      }
    })
    .then(response => {
     this.setState({
        carNameList: response.data,
        monitor: 0
      }, () => console.log(this.state.carNameList))

    })
    .catch(error => {alert('Error retrieving Data. Kindly refresh the page and try again.')})
  }else if(name  === 'carName'){
    if (value === '') {
    axios.get(this.sendURL, {
      params: {
          value,
          carYear: this.state.carYear,
          send: 'Get Car Models'
      }
    })
    .then(response => {
     /* this.setState({
        carModelList: response.data,
        monitor: 0
      }, () => console.log(this.state.carModelList))
      */
     console.log(response)
    })
    .catch(error => {alert('Error retrieving Data. Kindly refresh the page and try again.')})
  }
  }
  }

  changeHandler = e => {
      this.setState({
        [e.target.name]: e.target.value
    })
    if(e.target.name === 'carYear'){
      this.setState({
        monitor: 1
    })
    this.getCarNames(e.target.name, e.target.value)
  }else if(e.target.name  === 'carName'){
    this.setState({
      monitor: 2
  })
  this.getCarNames(e.target.name, e.target.value)
  }
}

   submitCarDetails = (e) => {
    e.preventDefault()
    const {carYear, carName, carModel, carNameOthers, carModelOthers} = this.state
    if((carYear === '') || (carName === '') || (carModel === '')) {
      this.setState({
        checker: true
      })
    }else{
      console.log(`Car Year: ${carYear} and Car Name: ${carName} and Car Model: ${carModel} and Car Model Others: ${carModelOthers} and Car Name Others: ${carNameOthers}`)
      this.setState({
      nextForm: false
      })      
    }
   }

   toggleDisplay = () => {
    this.setState({
      nextForm: true
    })
   }

   closeForm = () => {
    this.setState({
      carYear: '',
      carName: '',
      carModel: '',
      carModelOthers: '',
      carNameOthers: '',
      openModal: true
    })
    this.toggleDisplay() 
   }

   
    render() {
      const {carYear, carName, carModel, checker, nextForm, monitor, openModal} = this.state
        return (
            <div className="getQuotation" ref={this.props.quotationRef}>
                <h1>Get a Quotation</h1>
                {nextForm ? <div className="quotationForm" >
<Container>
<Form id="carBasicForm">
    <Row>
<Col sm={4} xs={12}>
<Form.Control as="select" onChange={this.changeHandler} className={carYear === '' && checker ? 'errorDisplay' : ''} name="carYear" value={carYear}>
    <option>{carYear === '' && checker ? 'Kindly select your Car Year' : 'Select Year'}</option>
          {this.opts}
  </Form.Control>
</Col>

<Col sm={4} xs={12}>
<Form.Control type="text" onChange={this.changeHandler} className={`selectCarName ${carName === '' && checker ? 'errorDisplay' : ''}`} name="carName" value={carName} list="car_brand_data" placeholder={monitor === 1 ? "Loading Car Brands": "Enter Car Brand" }  />
<datalist id="car_brand_data">
{this.state.carNameList.map((carName, index) => <option key={index} value={carName.car_brand} />)}
  </datalist>
</Col>

<Col sm={4} xs={12}>
<Form.Control type="text" placeholder={monitor === 2 ? "Loading Car Models": "Enter Car Model"} className={carModel === '' && checker ? 'errorDisplay' : ''} name="carModel" value={carModel} onChange={this.changeHandler} list="car_model_data" />
<datalist id="car_model_data">
{this.state.carModelList.map((carModel, index) => <option key={index} value={carModel.car_model} />)}
  </datalist>
</Col>


<Col xs={12}><Button onClick={(e) => this.submitCarDetails(e)} className="submitButtonNormal">Save <ImCheckmark /></Button></Col>
</Row>
</Form>
</Container>
</div>
 : <Container>
 <Offer handleBtn = {this.toggleDisplay} closeForm={this.closeForm} carYear = {carYear} carName = {carName} carModel = {carModel}/>
 </Container>}
 {openModal ? <InfoModal offerOpenModal={openModal}/> : ''}
</div>
        )
    }
}

export default Quotation
