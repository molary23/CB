import React, { Component } from 'react'
import axios from 'axios'
import { Form, Row, Col, Button, InputGroup, Spinner} from 'react-bootstrap'
import { FaCarSide,  FaCarCrash, FaUserCircle } from 'react-icons/fa'
import { GiCarWheel, GiAutoRepair } from 'react-icons/gi'
import { ImKey2, ImCheckmark2, ImCheckmark } from 'react-icons/im'
import { GoDashboard } from 'react-icons/go'
import {RiArrowGoBackLine} from 'react-icons/ri'

 class Offer extends Component {

    constructor(props) {
        super(props)
    
        this.state = {
             active: 0,
             checking: false,
             carLocation: '',
             carTitle: '',
             carTire: '',
             carFlat: '',
             carWheel: '',
             carKey: '',
             carDrive: '',
             carEngine: '', carExternal: '',  carInterior: '', carBody: '', carMirror: '', carFlood: '', carMileage: '', carMileageVerify: false, contactName: '', contactPhone: '', contactEmail: '', contactZip: '', driverFrontTire: '', driverRearTire: '', passFrontTire: '', passRearTire: '', passRearWheel: '', passFrontWheel: '', driverRearWheel: '', driverFrontWheel: '', passRearExt: '', driverRearExt: '', passFrontExt: '', driverFrontExt: '', passRearBody: '', driverRearBody: '', passFrontBody: '', driverFrontBody: '', driverFrontMirror: '', driverRearMirror: '', passFrontMirror: '', passRearMirror:'', loader: false
        }
        this.myURL = '//localhost/fljc/fe/feSend.php';
    }

    changeHandler = e => {
        this.setState({
            [e.target.name]: e.target.value
        })
    }

    handleMultipleChange = e => {
        var options = e.target.options;
        var value = [];
        for (var i = 0, l = options.length; i < l; i++) {
          if (options[i].selected) {
            value.push(options[i].value);
          }
        }
        
        this.setState({[e.target.name]: value})
      }

      checkHandler = (e, checkData) => {
        const target = e.target;
        const value = target.type === 'checkbox' ? target.checked : target.value;
        const name = target.name;
        if (value) {
            this.setState({
                [name]:  checkData
            })    
        }else{
            this.setState({
                [name]:  ''
            })  
        }
        }


        checkingHandler = e => {
            const target = e.target;
            const value = target.type === 'checkbox' ? target.checked : target.value;
            const name = target.name;
            if(value){
                alert('Selecting "Unable to verify" may decrease your offer and should only be selected if you cannot visually confirm the mileage of the vehicle upon inspection of the odometer.')
            }
            this.setState({
                [name]:  value
            })
            }


    componentDidMount(){
   }

    moveActive = (nextTab) => {
        this.setState({
            active: nextTab
        })
    }

    submitDetails = (nextTab) => {
    const {carLocation, carTitle} = this.state
    if ((carLocation === '') || (carTitle === '')) {
        this.setState({
            checking: true
        }) 
    }else{
    this.moveActive(nextTab) 
    }
    }

    

    submitKey = (nextTab) => {
        const {carKey, carDrive} = this.state
        if ((carKey === '') || (carDrive === '')) {
            this.setState({
                checking: true
            }) 
        }else{
        this.moveActive(nextTab) 
        }
        }

    submitTire = (nextTab) => {
        const {carWheel, carTire, carFlat, driverFrontTire, driverRearTire, passFrontTire, passRearTire, passRearWheel, passFrontWheel, driverRearWheel, driverFrontWheel} = this.state
        if ((carWheel === '') || (carTire === '') || (carFlat === '') || ((carFlat === 'y') && ((driverFrontTire === '') && (driverRearTire === '') && (passFrontTire === '') && (passRearTire === ''))) || ((carWheel === 'n') && ((passRearWheel === '') && (passFrontWheel === '') && (driverFrontWheel === '') && (driverRearWheel === '')))) {
            this.setState({
                checking: true
            }) 
        }else{
            console.log(`DFT: ${driverFrontTire} DRT: ${driverRearTire} PFT: ${passFrontTire} PRT: ${passRearTire} 2: DFT: ${driverFrontWheel} DRT: ${driverRearWheel} PFT: ${passFrontWheel} PRT: ${passRearWheel}`)
            this.moveActive(nextTab) 
        }
    }

    submitEngine = (nextTab) => {
        const {carEngine, carExternal, carInterior, passRearExt, driverRearExt, passFrontExt, driverFrontExt} = this.state
        if ((carEngine === '') || (carExternal === '') || (carInterior === '') || ((carExternal === 'y') && (passRearExt === '') && (driverRearExt === '') && (passFrontExt === '') && (driverFrontExt === ''))) {
            this.setState({
                checking: true
            }) 
        }else{
        console.log(`DFT: ${passRearExt} DRT: ${driverRearExt} PFT: ${passFrontExt} PRT: ${driverFrontExt}`)
        this.moveActive(nextTab) 
        }
        }
    
    submitDamages = (nextTab) => {
        const {carBody, carMirror, carFlood, passRearBody, driverRearBody, passFrontBody, driverFrontBody, driverFrontMirror, driverRearMirror, passFrontMirror, passRearMirror} = this.state
        if ((carBody === '') || (carMirror === '') || (carFlood === '') || ((carBody === 'y') && (passRearBody === '') && (driverRearBody === '') && (passFrontBody === '') && (driverFrontBody === '')) || ((carMirror === 'y') && (driverFrontMirror === '') && (driverRearMirror === '') && (passFrontMirror === '') && (passRearMirror === ''))) {
            this.setState({
                checking: true
            }) 
        }else{
            console.log(`DFT: ${driverFrontBody} DRT: ${driverRearBody} PFT: ${passRearBody} PRT: ${passFrontBody} 2: DFT: ${driverFrontMirror} DRT: ${driverRearMirror} PFT: ${passFrontMirror} PRT: ${passRearMirror}`)
            this.moveActive(nextTab) 
        }
    }

    submitMileage = (nextTab) => {
        const {carMileage, carMileageVerify} = this.state
        console.log(`${carMileage} , ${carMileageVerify}`)
        if (carMileage === '' && !carMileageVerify) {
            this.setState({
                checking: true
            }) 
        }else if(carMileage !== '' && carMileageVerify){
            this.setState({
                checking: true
            }) 
        }else if(carMileage === '' && carMileageVerify){
        this.setState({
            carMileage: 'Unknown'
        })  
        this.moveActive(nextTab) 
        }else{
        this.moveActive(nextTab) 
        }
        }

        submitAll = (e) => {
            e.preventDefault()
            const {contactName, contactPhone, contactEmail, driverFrontMirror, driverRearMirror, passFrontMirror, passRearMirror, driverFrontTire, driverRearTire, passFrontTire, passRearTire, passRearBody, driverRearBody, passFrontBody, driverFrontBody, passRearWheel, passFrontWheel, driverRearWheel, driverFrontWheel, passRearExt, driverRearExt, passFrontExt, driverFrontExt,carBody, carMirror, carFlood,carEngine, carExternal, carInterior,carWheel, carTire, carFlat,carLocation, carTitle, carKey, carDrive, carMileage, contactZip} = this.state
            if ((contactName === '' ) || (contactPhone === '' )  || (contactEmail === '' ) ) {
                this.setState({
                    checking: true
                }) 
            }else{
                this.setState({
                    loader: true
                }) 
                let badTire = [driverFrontTire, driverRearTire, passFrontTire, passRearTire],
                badWheel = [passRearWheel, passFrontWheel, driverRearWheel, driverFrontWheel],
                badBody = [passRearBody, driverRearBody, passFrontBody, driverFrontBody],
                badExt = [passRearExt, driverRearExt, passFrontExt, driverFrontExt],
                badMirror = [driverFrontMirror, driverRearMirror, passFrontMirror, passRearMirror]          
    console.log(`Year: ${this.props.carYear} Name: ${this.props.carName} Model: ${this.props.carModel} Email: ${this.state.contactEmail} Mileage: ${this.state.carMileage} Location: ${this.state.carLocation} Flat: ${this.state.carFlat} Mirror: ${this.state.carMirror} Zip: ${this.state.contactZip}` )
    axios({
        method: "post",
        url: this.myURL,
        timeout: 5000, // Wait for 5 seconds
        headers: {
            'Content-Type': 'application/json',
            "Access-Control-Allow-Origin": "*"
        },
        data: {
             carLocation ,
             carTitle ,
             carTire ,
             carFlat ,
             carWheel ,
             carKey ,
             carDrive ,
             carEngine , carExternal , carInterior , carBody , carMirror , carFlood , carMileage, contactName , contactPhone , contactEmail , contactZip, badTire, badWheel, badBody, badExt, badMirror, carYear: this.props.carYear, carBrand:  this.props.carName, carModel: this.props.carModel,
            type: 'Car Details'
        }
        })
        .then(response => {
            var resp = response.data;
            if (resp === 0) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 1) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 2) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 3) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 4) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 5 ) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 6 ) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 7) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 8) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 9) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 10 ) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 11) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 12 ) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 13) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 14) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 15) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 16) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 17) {
                  alert(`Kindly enter the Car's `)
                }else if (resp === 18 ) {
                  alert(`Kindly enter the Car's `)
                }else if (resp === 19) {
                alert(`Kindly enter the Car's `)
              }else if (resp === 20) {
                alert(`Oops! Something went wrong. Try after some time.`);
              }else if (resp === 200) {
                  this.setState({
                      checking: false,
                      loader: false
                  })
                  this.props.closeForm() 
              }
          
        })
        .catch(error => {alert('Error retrieving Data. Kindly refresh the page and try again.')});
    
            }
        }

    render() {
        const {carLocation, carTitle, checking, carWheel, carTire, carFlat, carDrive, carKey, carEngine, carExternal, carInterior, carBody, carMirror, carFlood, carMileage, carMileageVerify, contactName, contactPhone, contactEmail, contactZip, driverFrontTire, driverRearTire, passFrontTire, passRearTire, passRearWheel, passFrontWheel, driverRearWheel, driverFrontWheel, passRearExt, driverRearExt, passFrontExt, driverFrontExt, passRearBody, driverRearBody, passFrontBody, driverFrontBody, driverFrontMirror, driverRearMirror, passFrontMirror, passRearMirror, loader} = this.state
        return (
            <div className="offer">
            <div className="card card-nav-tabs card-plain">
                    <div className="card-header card-header-primary d-none d-md-block">
                        <div className="nav-tabs-navigation">
                            <div className="nav-tabs-wrapper">
                                <ul className="nav nav-pills justify-content-center" data-tabs="tabs">
                                    <li className="nav-item">
                                        <Button  className={`nav-link ${this.state.active === 0 ? 'active': ''} `} >
                                            <FaCarSide size={20}/>  Car Details </Button>
                                    </li>
                                    <li className="nav-item">
                                        <Button  className={`nav-link ${this.state.active === 1 ? 'active': ''} `} >
                                        <GiCarWheel size={20} />  Tire & Wheels</Button>
                                    </li>
                                    <li className="nav-item">
                                        <Button  className={`nav-link ${this.state.active === 2 ? 'active': ''} `} >
                                            <ImKey2 size={20} />  Key & Drive</Button>
                                    </li>
                                    <li className="nav-item">
                                        <Button  className={`nav-link ${this.state.active === 3 ? 'active': ''} `} >
                                            <GiAutoRepair size={20} />  Engine & Parts</Button>
                                    </li>
                                    <li className="nav-item">
                                        <Button  className={`nav-link ${this.state.active === 4 ? 'active': ''} `} >
                                            <FaCarCrash size={20} />  Damages</Button>
                                    </li>
                                    <li className="nav-item">
                                        <Button  className={`nav-link ${this.state.active === 5 ? 'active': ''} `} >
                                            <GoDashboard size={20} />  Mileage</Button>
                                    </li>
                                    <li className="nav-item">
                                        <Button className={`nav-link ${this.state.active === 6 ? 'active': ''} `} >
                                            <FaUserCircle size={20} />  Contact</Button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div className="card-body container">
                        <div className="tab-content">
                            <div className={`tab-pane ${this.state.active === 0 ? 'active': ''} `}id="carDetails">
                            <Row>
                                <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carLocation === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carLocation" value={carLocation}>
                                    <option value="">Car Location</option>
                                    <option value="r">Residence</option>
                                    <option value="b">Business</option>
                                </Form.Control>
                                </Col>
                                <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carTitle=== '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carTitle" value={carTitle}>
                                    <option value="">Car Title</option>
                                    <option value="c">Clean Title</option>
                                    <option value="s">Salvage or Rebuilt</option>
                                    <option value="n">No Title</option>
                                </Form.Control>
                                </Col>
                                <Col xs={12}>
                                <Button variant="outline-primary" onClick={this.props.handleBtn} className="submitButtonOutline"> <RiArrowGoBackLine /> Back</Button>
                                <Button variant="primary" onClick={() => this.submitDetails(1)} className="submitButtonNormal">Continue <ImCheckmark /></Button>
                                </Col>
                            </Row>
                            </div>
                            <div className={`tab-pane ${this.state.active === 1 ? 'active': ''} `} id="tires">
                            <Row>
                                <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carTire=== '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carTire" value={carTire}>
                                    <option value="">Does your car have 4 tires</option>
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </Form.Control>
                                </Col>
                                <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carFlat=== '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carFlat" value={carFlat}>
                                    <option value="">Does your car have any flat tires</option>
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </Form.Control>
                                </Col>
                                {carFlat === 'y' ? 
                                <Col sm={6} xs={12}>
                                <Form.Group>
                                <h3 className={carFlat === '' && checking ? 'errorDisplay' : ''}>Which part is having Flat Tires?</h3>
                                <Col sm={6} xs={12}>
                                <Form.Check  inline label="Driver-Front-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Driver Front")} name="driverFrontTire" value={driverFrontTire} />
                                <Form.Check inline label="Driver-Rear-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Driver Rear")} name="driverRearTire" value={driverRearTire} />
                                </Col>
                                <Col  sm={6} xs={12}>
                                <Form.Check  inline label="Passenger-Front-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Passenger Front")} name="passFrontTire" value={passFrontTire} />
                                <Form.Check inline label="Passenger-Rear-Side" type="checkbox" onChange={(e) => this.checkHandler(e, 'Passenger Rear')} name="passRearTire" value={passRearTire} />
                                </Col>
                                </Form.Group>
                                </Col>
                                : ''}
                                <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carWheel === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carWheel" value={carWheel}>
                                    <option value="">Are all Wheels present?</option>
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </Form.Control>
                                </Col>
                                {carWheel === 'n' ? 
                                <Col sm={6} xs={12}>
                                <Form.Group >
                                <h3 className={carWheel=== '' && checking ? 'errorDisplay' : ''}>Which Wheel is absent?</h3>
                                <Col sm={6} xs={12}>
                                <Form.Check  inline label="Driver-Front-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Driver Front")} name="driverFrontWheel" value={driverFrontWheel} />
                                <Form.Check inline label="Driver-Rear-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Driver Rear")} name="driverRearWheel" value={driverRearWheel} />
                                </Col>
                                <Col  sm={6} xs={12}>
                                <Form.Check  inline label="Passenger-Front-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Passenger Front")} name="passFrontWheel" value={passFrontWheel} />
                                <Form.Check inline label="Passenger-Rear-Side" type="checkbox" onChange={(e) => this.checkHandler(e, 'Passenger Rear')} name="passRearWheel" value={passRearWheel} />
                                </Col>
                                </Form.Group>
                                </Col>
                                : ''}
                                <Col xs={12}>
                                <Button variant="outline-primary"  onClick={() => this.moveActive(0)} className="submitButtonOutline"> <RiArrowGoBackLine /> Back</Button>
                                <Button variant="primary" onClick={() => this.submitTire(2)} className="submitButtonNormal">Continue <ImCheckmark /></Button>
                                </Col>
                            </Row>
                           </div>
                            <div className={`tab-pane ${this.state.active === 2 ? 'active': ''} `}  id="key">
                                <Row>
                            <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carKey === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carKey" value={carKey}>
                                    <option value="">Does it have keys</option>
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </Form.Control>
                                </Col>
                                <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carDrive === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carDrive" value={carDrive}>
                                    <option value="">Does it drive</option>
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </Form.Control>
                                </Col>
                                <Col xs={12}>
                                <Button variant="outline-primary"  onClick={() => this.moveActive(1)} className="submitButtonOutline"> <RiArrowGoBackLine /> Back</Button>
                                <Button variant="primary" onClick={() => this.submitKey(3)} className="submitButtonNormal">Continue <ImCheckmark /></Button>
                                </Col>
                                </Row>
                            </div>
                            <div className={`tab-pane ${this.state.active === 3 ? 'active': ''} `}  id="engine">
                                <Row>
                            <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carEngine=== '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carEngine" value={carEngine}>
                                    <option value="">Engine Status</option>
                                    <option value="i">Intact Engine & Transmission</option>
                                    <option value="m">Some parts are missing</option>
                                    <option value="r">Engine has been removed</option>
                                </Form.Control>
                                </Col>
                                <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carExternal=== '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carExternal" value={carExternal}> 
                                    <option value="">Any removed Exterior body part?</option>
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </Form.Control>
                                </Col>
                                {carExternal === 'y' ? 
                                <Col sm={6} xs={12}>
                                <Form.Group >
                                <h3 className={carExternal === '' && checking ? 'errorDisplay' : ''}>Which Wheel is absent?</h3>
                                <Col sm={6} xs={12}>
                                <Form.Check  inline label="Driver-Front-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Driver Front")} name="driverFrontExt" value={driverFrontExt} />
                                <Form.Check inline label="Driver-Rear-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Driver Rear")} name="driverRearExt" value={driverRearExt} />
                                </Col>
                                <Col  sm={6} xs={12}>
                                <Form.Check  inline label="Passenger-Front-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Passenger Front")} name="passFrontExt" value={passFrontExt} />
                                <Form.Check inline label="Passenger-Rear-Side" type="checkbox" onChange={(e) => this.checkHandler(e, 'Passenger Rear')} name="passRearExt" value={passRearExt} />
                                </Col>
                                </Form.Group>
                                </Col>
                                : ''}
                                <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carInterior === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carInterior" value={carInterior}>
                                    <option value="">Any damaged or removed Interior parts?</option>
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </Form.Control>
                                </Col>
                                <Col xs={12}>
                                <Button variant="outline-primary"  onClick={() => this.moveActive(2)} className="submitButtonOutline"> <RiArrowGoBackLine /> Back</Button>
                                <Button variant="primary" onClick={() => this.submitEngine(4)} className="submitButtonNormal">Continue <ImCheckmark /></Button>
                                </Col>        
                                </Row>
                            </div>
                            <div className={`tab-pane ${this.state.active === 4 ? 'active': ''} `}  id="damages">
                               <Row>
                               <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carBody === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carBody" value={carBody}>
                                    <option value="">Does it have any body damage?</option>
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </Form.Control>
                                </Col>
                                {carBody === 'y' ? 
                                <Col sm={6} xs={12}>
                                <Form.Group>
                                <h3 className={carBody === '' && checking ? 'errorDisplay' : ''}>Which part of the Body has been damaged?</h3>
                                <Col sm={6} xs={12}>
                                <Form.Check  inline label="Driver-Front-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Driver Front")} name="driverFrontBody" value={driverFrontBody} />
                                <Form.Check inline label="Driver-Rear-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Driver Rear")} name="driverRearBody" value={driverRearBody} />
                                </Col>
                                <Col  sm={6} xs={12}>
                                <Form.Check  inline label="Passenger-Front-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Passenger Front")} name="passFrontBody" value={passFrontBody} />
                                <Form.Check inline label="Passenger-Rear-Side" type="checkbox" onChange={(e) => this.checkHandler(e, 'Passenger Rear')} name="passRearBody" value={passRearBody} />
                                </Col>
                                </Form.Group>
                                </Col>
                                : ''}
                                <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carFlood === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carFlood" value={carFlood}>
                                    <option value="">Any Flood or fire damage?</option>
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </Form.Control>
                                </Col>
                                <Col sm={6} xs={12}>
                                <Form.Control as="select" className={carMirror === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carMirror" value={carMirror}>
                                    <option value="">Any damaged mirrors, glass, or lights?</option>
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </Form.Control>
                                </Col>
                                {carMirror === 'y' ? 
                                <Col sm={6} xs={12}>
                                <Form.Group>
                                <h3 className={carMirror === '' && checking ? 'errorDisplay' : ''}>Which part of the Glass/Mirror/Light have been damaged?</h3>
                                <Col sm={6} xs={12}>
                                <Form.Check  inline label="Driver-Front-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Driver Front")} name="driverFrontMirror" value={driverFrontMirror} />
                                <Form.Check inline label="Driver-Rear-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Driver Rear")} name="driverRearMirror" value={driverRearMirror} />
                                </Col>
                                <Col  sm={6} xs={12}>
                                <Form.Check  inline label="Passenger-Front-Side" type="checkbox" onChange={(e) => this.checkHandler(e, "Passenger Front")} name="passFrontMirror" value={passFrontMirror} />
                                <Form.Check inline label="Passenger-Rear-Side" type="checkbox" onChange={(e) => this.checkHandler(e, 'Passenger Rear')} name="passRearMirror" value={passRearMirror} />
                                </Col>
                                </Form.Group>
                                </Col>
                                : ''}
                                <Col xs={12}>
                                <Button variant="outline-primary"  onClick={() => this.moveActive(3)} className="submitButtonOutline"> <RiArrowGoBackLine /> Back</Button>
                                <Button variant="primary" onClick={() => this.submitDamages(5)} className="submitButtonNormal">Continue <ImCheckmark /></Button>
                                </Col>
                               </Row>
                               </div>
                            <div className={`tab-pane ${this.state.active === 5 ? 'active': ''} `}  id="mileage">
                            <Row>
                            <Col sm={6} xs={12}>
                            <InputGroup className="mb-2">
                            <Form.Control id="inlineFormInputGroup" placeholder="Mileage in" className={carMileage === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="carMileage" value={carMileage}/>
                            <InputGroup.Append>
                            <InputGroup.Text className={carMileage === '' && checking ? 'errorDisplay' : ''}>,000</InputGroup.Text>
                            </InputGroup.Append>
                            </InputGroup>
                            </Col>
                            <Col xs={12}>
                            <Form.Group>
                                <Form.Check
                                inline
                                label="Can't verify"
                                onChange={this.checkingHandler} name="carMileageVerify" value={carMileageVerify}
                                />
                            </Form.Group>
                            </Col>
                            <Col xs={12}>
                            <Button variant="outline-primary"  onClick={() => this.moveActive(4)} className="submitButtonOutline"> <RiArrowGoBackLine /> Back</Button>
                                <Button variant="primary" onClick={() => this.submitMileage(6)} className="submitButtonNormal">Continue <ImCheckmark /></Button>
                                </Col>
                            </Row>
                            </div>
                            <div className={`tab-pane ${this.state.active === 6 ? 'active': ''} `}  id="contact">
                                <Row>
                            <Col sm={6} xs={12}>
                            <Form.Control type="text" placeholder="Name" className={contactName === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="contactName" value={contactName} required/>
                            </Col>
                            <Col sm={6} xs={12}>
                            <Form.Control type="text" placeholder="Phone Number" className={contactPhone === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="contactPhone" value={contactPhone} required/>
                            </Col>
                            <Col sm={6} xs={12}>
                            <Form.Control type="text" placeholder="Email Address" className={contactEmail === '' && checking ? 'errorDisplay' : ''} onChange={this.changeHandler} name="contactEmail" value={contactEmail} required/>
                            </Col>
                            <Col sm={6} xs={12}>
                            <Form.Control type="text" placeholder="Zip Code" onChange={this.changeHandler} name="contactZip" value={contactZip}/>
                            </Col>
                            <Col xs={12}>
                            <Button variant="outline-primary"  onClick={() => this.moveActive(5)} className="submitButtonOutline"> <RiArrowGoBackLine /> Back</Button>
        <Button variant="primary" onClick={(e) => this.submitAll(e)} className="submitButtonNormal">Save {loader ? <Spinner animation="grow" size="sm" /> : <ImCheckmark2 />}</Button>
                                </Col>
                            </Row>
                            </div>
                        </div>
                    </div></div>
                    </div>
        )
    }
}

export default Offer
