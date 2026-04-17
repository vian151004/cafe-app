import './bootstrap';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { 
  Receipt, 
  Clock, 
  Package, 
  User, 
  ChevronRight, 
  Plus, 
  Minus,
  X,
  Check,
  Search,
  Filter,
  MoreVertical,
  LogOut,
  Coffee
} from 'lucide';

gsap.registerPlugin(ScrollTrigger);

window.gsap = gsap;
window.lucide = {
  Receipt,
  Clock,
  Package,
  User,
  ChevronRight,
  Plus,
  Minus,
  X,
  Check,
  Search,
  Filter,
  MoreVertical,
  LogOut,
  Coffee
};
