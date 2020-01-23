// import external dependencies
import BarbaInit from './barba-config/init'

// import local dependencies
//import Router from './util/Router';
import home from './views/home'
import blog from './views/blog'
import singlePost from './views/singlePost'
import page from './views/page'
import postTypeArchiveCssmDoctor from './views/postTypeArchiveCssmDoctor'
import singleCssmDoctor from './views/singleCssmDoctor'
import postTypeArchiveCssmSpeciality from './views/postTypeArchiveCssmSpeciality'
import singleCssmSpeciality from './views/singleCssmSpeciality'
import postTypeArchiveCssmExam from './views/postTypeArchiveCssmExam'
//import singleCssmExam from './views/singleCssmExam'
import templateAppointment from './views/templateAppointment'
import templateUnidadepediatria from './views/templateUnidadepediatria'
import templateUcc from './views/templateUcc'
import common from './common';



/** Populate Router instance with DOM routes */
const views = [
  home,
  blog,
  singlePost,
  page,
  postTypeArchiveCssmDoctor,
  singleCssmDoctor,
  postTypeArchiveCssmSpeciality,
  singleCssmSpeciality,
  postTypeArchiveCssmExam,
  //singleCssmExam,
  templateAppointment,
  templateUnidadepediatria,
  templateUcc,
  common,
];

// Load Events
document.addEventListener("DOMContentLoaded", function() {
  BarbaInit(views)
  common()
});