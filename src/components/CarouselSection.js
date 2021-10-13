import React from 'react'
import { Button } from 'react-bootstrap'


function CarouselSection(props) {
  const {quotationRef, contactRef} = props

  const clickHandler = (value) => {
    let linkID = value.target.id
     switch(linkID){
         case 'getAnOffer':
          scrollingTo(quotationRef.current, 30)
             break;
         case 'contactUsNow':   
             scrollingTo(contactRef.current, 120)
             break;
         default:
             scrollingTo(0)
     }
 }

 const scrollingTo = (top, value) => {
         window.scrollTo({
             top: top.offsetTop - value,
             behavior: 'smooth'
           })
 }
 


    return (
        <div className="topCarousel">
            <div id="topCarousel" className="carousel slide" data-ride="carousel">


<ul className="carousel-indicators">
  <li data-target="#topCarousel" data-slide-to="0" className="active"></li>
  <li data-target="#topCarousel" data-slide-to="1"></li>
  <li data-target="#topCarousel" data-slide-to="2"></li>
</ul>

<div className="carousel-inner">
  <div className="carousel-item active">
    <img src="/fljc/../sell.jpg" alt="Los Angeles" />
    <div className="carousel-caption">
<h1 >Fast, Simple & Reliable</h1>
<h2 >Get an offer for your junk your car in Atlanta, GA in a minute or 2 and have ther car sold in 1 - 2 days.</h2>
<Button className="submitButtonNormal" id="getAnOffer" onClick={(e) => clickHandler(e)}>Get An Offer</Button>
</div>
  </div>
  <div className="carousel-item">
    <img src="/fljc/../tow.jpg" alt="Chicago" />
    <div className="carousel-caption">
<h1 >Free Truck Pick up</h1>
<h2 >Free towing and removal of cars and junk cars in Atlanta, GA and surrounding areas.</h2>
<Button href="tel:0816537863" className="callUs" variant="link">Call 0816537863</Button>
</div>
  </div>
  <div className="carousel-item">
    <img src="/fljc/../buy.jpg" alt="New York" />
    <div className="carousel-caption">
<h1 >Instant Payment</h1>
<h2 >We pay cash instantly for Cars, Trucks, Vans, SUV in Atlanta, GA.</h2>
<Button  className="submitButtonNormal" id="contactUsNow" onClick={(e) => clickHandler(e)}>Contact Us</Button>
</div>
  </div>
</div>

<a className="carousel-control-prev" href="#topCarousel" data-slide="prev">
  <span className="carousel-control-prev-icon"></span>
</a>
<a className="carousel-control-next" href="#topCarousel" data-slide="next">
  <span className="carousel-control-next-icon"></span>
</a>

</div>
        </div>
    )
}

export default CarouselSection
