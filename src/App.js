import React, {useRef} from 'react';
import logo from './logo.svg';
import './App.css';
import TopBar from './components/TopBar';
import CarouselSection from './components/CarouselSection';
import AboutSection from './components/AboutSection';
import './home.css';
import Reach from './components/Reach';
import Testimonials from './components/Testimonials';
import Quotation from './components/Quotation';
import Contact from './components/Contact';
import Footer from './components/Footer';
import Gallery from './components/Gallery';
import Faq from './components/Faq';


function App() {
 const galleryRef = useRef(),
  aboutRef = useRef(),
  quotationRef = useRef(),
  testimonialRef = useRef(),
  contactRef = useRef(),
  faqRef = useRef()
  return (
    <div className="App">
      <TopBar quotationRef={quotationRef} aboutRef={aboutRef} galleryRef={galleryRef} testimonialRef={testimonialRef} contactRef={contactRef} faqRef={faqRef}/>
      <CarouselSection contactRef={contactRef} quotationRef={quotationRef}/>
      <AboutSection aboutRef={aboutRef}/>
      <Quotation quotationRef={quotationRef} />
      <Reach />
      <Gallery galleryRef={galleryRef}/>
      <Testimonials testimonialRef={testimonialRef}/>
      <Faq faqRef={faqRef}/>
      <Contact contactRef={contactRef} />
      <Footer />
    </div>
  );
}

export default App;
