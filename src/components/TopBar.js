import React, {useState, useEffect} from 'react'
import { Nav, Navbar } from 'react-bootstrap';

function TopBar(props) {
    const [scroll, setScroll] = useState(false)
    const [navFocus, setFocus] = useState(0)

    const {aboutRef, quotationRef, galleryRef, testimonialRef, contactRef, faqRef} = props
    const clickHandler = (value) => {
       let linkID = value.target.id
        switch(linkID){
            case 'topBarHomeLink':
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                  })
                  setFocus(navFocus => 0)
                break;
            case 'topBarAboutLink':   
                scrollingTo(aboutRef.current, 30)
                setFocus(navFocus => 1)
                break;
            case 'topBarServiceLink':
                scrollingTo(aboutRef.current, -400)
                setFocus(navFocus => 2)
                break;
            case 'topBarHowLink':  
                scrollingTo(aboutRef.current, -900)
                setFocus(navFocus => 3)
                break;
            case 'topBarGetLink':
                scrollingTo(quotationRef.current, 60)
                setFocus(navFocus => 4)
                break;
            case 'topBarGalleryLink':   
                scrollingTo(galleryRef.current, 50)
                setFocus(navFocus => 5)
                break;
            case 'topBarTestLink':
                scrollingTo(testimonialRef.current, 50)
                setFocus(navFocus => 6)
                break;
            case 'topBarFaqLink':   
                scrollingTo(faqRef.current, 50)
                setFocus(navFocus => 7)
                break;
            case 'topBarContactLink':   
                scrollingTo(contactRef.current, 50)
                setFocus(navFocus => 8)
                break;
            default:
                scrollingTo(0)   
                setFocus(navFocus => 0)
        }
    }

    const scrollingTo = (top, value) => {
            window.scrollTo({
                top: top.offsetTop - value,
                behavior: 'smooth'
              })
    }
    

    useEffect(() => {
    const about = aboutRef.current,
    quotation = quotationRef.current,
    gallery = galleryRef.current,
    testimonial = testimonialRef.current,
    contact = contactRef.current,
    faq = faqRef.current
    
    const addFocus = () => {
    let winScroll = window.scrollY
    if((winScroll >= (0)) && (winScroll < (780))) {
    setFocus(navFocus => 0)
    }else if((winScroll >= (about.offsetTop - 100)) && (winScroll < (about.offsetTop + 350))) {
    setFocus(navFocus => 1)
    }else if ((winScroll >= (about.offsetTop + 325)) && (winScroll < (about.offsetTop + 850))) {
        setFocus(navFocus => 2)
        
    }else if ((winScroll >= (about.offsetTop + 850)) && (winScroll < (about.offsetTop + 1300))) {
        setFocus(navFocus => 3)
       
    }else if ((winScroll >= (quotation.offsetTop - 100)) && (winScroll < (quotation.offsetTop + 700))) {
        setFocus(navFocus => 4)
        
    }else if((winScroll >= (gallery.offsetTop - 50)) && (winScroll < (gallery.offsetTop + 700))) {
        setFocus(navFocus => 5)
        
    }else if ((winScroll >= (testimonial.offsetTop - 50)) && (winScroll < (testimonial.offsetTop + 470))){
        setFocus(navFocus => 6)
        
    }else if((winScroll >= (faq.offsetTop - 50)) && (winScroll < (faq.offsetTop + 250))){
        setFocus(navFocus => 7)
        
    }else if((winScroll >= (contact.offsetTop - 50)) && (winScroll < (contact.offsetTop + 450))){
        setFocus(navFocus => 8)
        
    }
          }

       
        window.addEventListener('scroll', addFocus, { passive: true })
        return () => {
            window.removeEventListener('scroll', addFocus)
        }
    }, [])

    useEffect(() => {
        const handleScroll = () => {
            let winScroll = window.scrollY
            if (winScroll > 0) {
                setScroll(scroll => true);
            }else{
              setScroll(scroll => false); 
            }
          }
          window.addEventListener('scroll', handleScroll, { passive: true })
          return () => {
              window.removeEventListener('scroll', handleScroll)
          }
    },[scroll] )



    

    return(
        <Navbar expand="lg" sticky="top" className={scroll ? 'navAffix' : 'topNavBar'}>
        <Navbar.Brand href="#home"> <img
        src="/flj/../logo.png"
        width="180"
        height="auto"
        className="d-inline-block align-top"
        alt="Car Buyer Solution"
      /></Navbar.Brand>

        <Navbar.Toggle aria-controls="basic-navbar-nav" />

        <Navbar.Collapse id="basic-navbar-nav">

            <Nav className="ml-auto">
            <Nav.Link href="#" id="topBarHomeLink" onClick={(e) => clickHandler(e)} className={navFocus === 0 ? 'focusNav': ''}>Home</Nav.Link >

            <Nav.Link href="#" id="topBarAboutLink" onClick={(e) => clickHandler(e)} className={navFocus === 1 ? 'focusNav': ''}>About Us</Nav.Link>

            <Nav.Link href="#" id="topBarServiceLink" onClick={(e) => clickHandler(e)} className={navFocus === 2 ? 'focusNav': ''}>Service</Nav.Link >

            <Nav.Link href="#" id="topBarHowLink" onClick={(e) => clickHandler(e)} className={navFocus === 3 ? 'focusNav': ''}>How it Works</Nav.Link>

            <Nav.Link href="#" id="topBarGetLink" onClick={(e) => clickHandler(e)} className={navFocus === 4 ? 'focusNav': ''}>Get a Quotation</Nav.Link>
            <Nav.Link href="#" id="topBarGalleryLink" onClick={(e) => clickHandler(e)} className={navFocus === 5 ? 'focusNav': ''}>Gallery</Nav.Link>
            <Nav.Link href="#" id="topBarTestLink" onClick={(e) => clickHandler(e)} className={navFocus === 6 ? 'focusNav': ''}>Testimonials</Nav.Link>
            <Nav.Link href="#" id="topBarFaqLink" onClick={(e) => clickHandler(e)} className={navFocus === 7 ? 'focusNav': ''}>FAQ</Nav.Link>
            <Nav.Link href="#" id="topBarContactLink" onClick={(e) => clickHandler(e)} className={navFocus === 8 ? 'focusNav': ''}>Contact us</Nav.Link>
            </Nav>

        </Navbar.Collapse>

    </Navbar>
    )
}

export default TopBar
