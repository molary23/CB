import React from 'react'
import { Container, Row, Col} from 'react-bootstrap';

function Faq(props) {
    return (
        <div className="faqSection" ref={props.faqRef}>
            <h1>Frequently Asked Questions</h1>
            <div className="faqContainer">
          <Container>
          <div id="accordion">
<Row>
    <Col md={6} xs={12} sm={6} lg={4}>
    <div className="card">
  <div className="card-header">
    <a className="card-link" data-toggle="collapse" href="#collapseOne">
    Does the car have to run?
    </a>
  </div>
  <div id="collapseOne" className="collapse show" data-parent="#accordion">
    <div className="card-body">
      No
    </div>
  </div>
</div>
    </Col>
    <Col md={6} xs={12} sm={6} lg={4}>
    <div className="card">
  <div className="card-header">
    <a className="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
    If My Junker Is Missing Parts Can I Still Sell It?
    </a>
  </div>
  <div id="collapseTwo" className="collapse" data-parent="#accordion">
    <div className="card-body">
    Yes, any condition will do.
    </div>
  </div>
</div>
    </Col>
    <Col md={6} xs={12} sm={6} lg={4}>

<div className="card">
  <div className="card-header">
    <a className="collapsed card-link" data-toggle="collapse" href="#collapseThree">
    Do I need to have a title?
    </a>
  </div>
  <div id="collapseThree" className="collapse" data-parent="#accordion">
    <div className="card-body">
     No
    </div>
  </div>
</div>
    </Col>
    <Col md={6} xs={12} sm={6} lg={4}>

<div className="card">
  <div className="card-header">
    <a className="collapsed card-link" data-toggle="collapse" href="#collapseFour">
    Who will pick up my car for cash?
    </a>
  </div>
  <div id="collapseFour" className="collapse" data-parent="#accordion">
    <div className="card-body">
    Upon accepting your offer our local dispatcher will contact you to set up the pick up of your vehicle. 
    </div>
  </div>
</div>
    </Col>
    <Col md={6} xs={12} sm={6} lg={4}>

<div className="card">
  <div className="card-header">
    <a className="collapsed card-link" data-toggle="collapse" href="#collapseFive">
    Is there a fee to get a quote or are they free?
    </a>
  </div>
  <div id="collapseFive" className="collapse" data-parent="#accordion">
    <div className="card-body">
      No, Quotes are FREE
    </div>
  </div>
</div>
    </Col>
    <Col md={6} xs={12} sm={6} lg={4}>

<div className="card">
  <div className="card-header">
    <a className="collapsed card-link" data-toggle="collapse" href="#collapseSix">
    Do you buy damaged cars?
    </a>
  </div>
  <div id="collapseSix" className="collapse" data-parent="#accordion">
    <div className="card-body">
      Yes
    </div>
  </div>
</div>
    </Col>
    <Col md={6} xs={12} sm={6} lg={4}>

<div className="card">
  <div className="card-header">
    <a className="collapsed card-link" data-toggle="collapse" href="#collapseSeven">
    I Need My Junk Car To Be Towed Away Today, What Can I Do?
    </a>
  </div>
  <div id="collapseSeven" className="collapse" data-parent="#accordion">
    <div className="card-body">
    If you prefer to have it picked up the same day we will do our best. Either way, we will be upfront and honest if we can or not so there are no surprises.
    </div>
  </div>
</div>
    </Col>
    <Col md={6} xs={12} sm={6} lg={4}>

<div className="card">
  <div className="card-header">
    <a className="collapsed card-link" data-toggle="collapse" href="#collapseEight">
    Is the process of selling my car easy?
    </a>
  </div>
  <div id="collapseEight" className="collapse" data-parent="#accordion">
    <div className="card-body">
    We show up, do five minutes of paperwork, give you money, and take the car away.” Yes, that really is the whole process. Yes, it really is that simple.
    </div>
  </div>
</div>
    </Col>
</Row>





</div> 
              </Container>  
              </div>
        </div>
    )
}

export default Faq
