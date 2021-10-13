import React, {useEffect, useRef, useState} from 'react'
import { Container, Row, Col, Image, Card } from 'react-bootstrap';

function AboutSection(props) {
const offsetRef = useRef()
const companyRef = useRef()
const [there, setThere] = useState(false)
const [carThere, setCarThere] = useState(false)

useEffect(() => {
    const handleScroll = () => {
        let howWorks = offsetRef.current.offsetTop - 100,
        companyCar = companyRef.current.offsetTop - 100,
        winScroll = window.scrollY
        if(winScroll >= companyCar){
            setCarThere(carThere => true) 
        }
        if(winScroll >= howWorks){
            setThere(there => true)
        } 
      } 
    window.addEventListener('scroll', handleScroll, { passive: true })
    return () => {
        window.removeEventListener('scroll', handleScroll)
    }
}, [])

return  (<div className="aboutSection" ref={props.aboutRef}>
<div className="aboutCompany" ref={companyRef}>
<h1>Our Company</h1>
<div className="companyInfo">
<Container>
<Row>
<Col lg={1} className="d-none d-lg-block"></Col>
<Col lg={10} xs={12}>
<Row>
<Col sm={4} className="d-none d-sm-block">
    <div className={`carCompany ${carThere ? 'companyCar ' : 'd-none '}`}>
<Image src="/fljc/../car.png" fluid />
</div>
</Col>
<Col sm={8} >
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</Col>
</Row>


</Col>
<Col lg={1} className="d-none d-lg-block"></Col>
</Row>
</Container>
</div>
</div>

<div className="aboutService">
<div className="serviceAbout">
<Container>
<h1>Our Services</h1>
<div className="serviceInfo">
<p>

Car Buyer Solution buys cars for cash in Atlanta Georgia and its surrounding, we have an expansive network of car buyers and junkyards across the globe.
We buy used cars, crossovers, minivans, SUVs and trucks so that you can earn some cash while cleaning up your yard, garage or driveway.

We can help you sell your car and get rid of it in under 48 business hours. We will also cover all the costs for pick-up and towing.

Car Buyer welcomes all makes and models of vehicles, domestic and foreign, running or not. Plus, we'll pay top dollar for your junk car or truck.

Additionally, you can count on Car Buyer Solution to properly dispose every piece of your vehicle in the most eco-friendly way possible.

</p>
</div>
</Container>
</div>
</div>


<div className="howWorks" ref={offsetRef}>
<h1>How it <em>Works</em></h1>
<div className="worksInfo">
<Container>
<Row>
<Col md={6} xs={12} sm={6} lg={3}>
<Card className="howWorkList">
<Card.Body>
<div className={`numberWorks ${there ? 'numberWorksMove' : ''}`}>01</div>
<Card.Title>Get a Free Quote</Card.Title>
<Card.Text>
Fill a quick Form below or call us at <a href="tel:098875674224">098875674224</a> to get an instant estimate for your junk car.
</Card.Text>
</Card.Body>
</Card>


</Col>
<Col md={6} xs={12} sm={6} lg={3}>
<Card className="howWorkList">
<Card.Body>
<div className={`numberWorks ${there ? 'numberWorksMove' : ''}`}>02</div>
<Card.Title>Accept Offer</Card.Title>
<Card.Text>
Accept the quotation for your car. We offer fair market price which can go as high as $40,000.
</Card.Text>
</Card.Body>
</Card>
</Col>
<Col md={6} xs={12} sm={6} lg={3}>
<Card className="howWorkList">
<Card.Body>
<div className={`numberWorks ${there ? 'numberWorksMove' : ''}`}>03</div>
<Card.Title>Car Removal</Card.Title>
<Card.Text>
A tow truck will come and pick up your car at your location and haul it away for you.
</Card.Text>
</Card.Body>
</Card>
</Col>
<Col md={6} xs={12} sm={6} lg={3}>
<Card className="howWorkList">
<Card.Body>
<div className={`numberWorks ${there ? 'numberWorksMove' : ''}`}>04</div>
<Card.Title>Get Paid</Card.Title>
<Card.Text>
You will be paid fair market value in cash on the spot before the tow truck hauls your car away. 
</Card.Text>
</Card.Body>
</Card>
</Col>
</Row>
</Container>
</div>
</div>
</div>
)
}


export default AboutSection
