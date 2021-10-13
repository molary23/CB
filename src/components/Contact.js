import React, { Component } from 'react'
import axios from 'axios'
import { Container, Row, Col, Form, Button, Spinner } from 'react-bootstrap'
import { FaHome, FaPhone, FaEnvelopeOpenText, FaInstagram, FaTwitterSquare, FaFacebookSquare } from 'react-icons/fa'
import { ImCheckmark } from 'react-icons/im'
import InfoModal from './InfoModal'

class Contact extends Component {
    constructor(props) {
        super(props)
    
        this.state = {
             name: '',
             email: '',
             phone: '',
             subject: '',
             message: '',
             checker: false,
             openModal: false,
             loader: false
        }
        this.myURL = '//localhost/fljc/fe/feContact.php';
    }

    changeHandler = e => {
        this.setState({
            [e.target.name]: e.target.value
        })
    }
    
    submitForm = e =>{
        e.preventDefault()
        const {name, email, phone, subject, message} = this.state
        if((name === '') || (email === '') || (phone === '') || (subject === '') || (message === '')){
            this.setState({
                checker: true
            })
        }else{
            this.setState({
                loader: true
            })
            //alert(`${name} and ${email} and ${phone} and ${subject} and ${message}`)
 

            axios({
                method: "post",
                url: this.myURL,
                timeout: 5000, // Wait for 5 seconds
                headers: {
                    'Content-Type': 'application/json',
                    "Access-Control-Allow-Origin": "*"
                },
                data: {
                    name, email, phone, subject, message,
                    type: 'Contact Us'
                }
                })
                .then(response => {
                    var resp = response.data;
                    if (resp === 0) {
                        //alert('Error sending Message. Kindly refresh the page and try again.')   
                    }else if (resp === 200) {

                        this.setState({
                            checker: false,
                            loader: false,
                            name: '',
                            email: '',
                            phone: '',
                            subject: '',
                            message: '',
                            openModal: true
                        }) 
                    }                  
                })
                .catch(error => {alert('Error sending Message. Kindly refresh the page and try again.')});
            
        }
    }
    render() {
        const {name, email, phone, subject, message, checker, openModal, loader} = this.state
        return (
            <div className="contactUs" ref={this.props.contactRef}>
                <h1>Contact Us</h1>
                <h2>Get in Touch</h2>
                <div className="contactDetails">
                    <Container>
                        <Form onSubmit={this.submitForm} className="contactForm">
                        <Row>
                            <Col sm={6} xs={12}>
                               <h4>We are only a Message away</h4>
                                    <Form.Group>
                                        <Form.Control type="text" placeholder={name === '' && checker ? 'Name can\'t be empty' : 'Name'} name="name" value={name} onChange={this.changeHandler} className={name === '' && checker ? 'errorDisplay' : ''}/>
                                        <Form.Control type="email" placeholder={email === '' && checker ? 'Email can\'t be empty' : 'Email Address'} name="email" value={email} onChange={this.changeHandler} className={email === '' && checker ? 'errorDisplay' : ''}/>
                                        <Form.Control type="tel" placeholder={phone === '' && checker ? 'Phone can\'t be empty' : 'Phone Number'} name="phone" value={phone} onChange={this.changeHandler} className={phone === '' && checker ? 'errorDisplay' : ''}/>
                                        <Form.Control type="subject" placeholder={subject === '' && checker ? 'Message subject can\'t be empty' : 'Subject'} name="subject" value={subject} onChange={this.changeHandler} className={subject === '' && checker ? 'errorDisplay' : ''}/>
                                        <Form.Control as="textarea" rows="3" placeholder={message === '' && checker ? 'Message can\'t be empty' : 'Message'} name="message" value={message} onChange={this.changeHandler} className={message === '' && checker ? 'errorDisplay' : ''}/>
                                    </Form.Group>
        <Button type="submit" className="submitButtonNormal">Submit {loader ? <Spinner animation="grow" size="sm" />: <ImCheckmark />}</Button>
                            </Col>
                            <Col sm={6} xs={12}>
                            <div className="contactAddress">
                                <Row>
                                    <Col xs={2}><FaHome size={30} /></Col>
                                    <Col xs={10}><address>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</address></Col>
                                    <Col xs={2}><FaPhone size={30} /></Col>
                                    <Col xs={10}><a href="tel:+129384848455">+1XXXXXXXXXXXX</a>, <a href="tel:+129384848455">+1XXXXXXXXXXXX</a></Col>
                                    <Col xs={2}><FaEnvelopeOpenText size={30}/></Col>
                                    <Col xs={10}><a href="mailto: abc@def.com" target="_blank" rel="noopener noreferrer">example@email.com</a>,  <a href="mailto: abc@def.com" target="_blank" rel="noopener noreferrer">example@email.com</a></Col>  
                                    <Col xs={1}><a href="facebook.com/thelucipost" target="_blank"><FaFacebookSquare size={30} />  </a></Col><Col xs={1}><a href="twitter.com/thelucipost" target="_blank"><FaTwitterSquare size={30} /> </a></Col><Col xs={1}><a href="instagram.com/thelucipost" target="_blank"><FaInstagram size={30} />  </a> </Col>                                 
                                </Row>
                                </div>
                            </Col>
                        </Row>
                        </Form>
                    </Container>
                </div>
                {openModal ? <InfoModal contactOpenModal={openModal}/> : ''}
            </div>
        )
    }
}

export default Contact
