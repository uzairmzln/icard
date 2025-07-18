<style scoped>
.sidebar-layout {
  display: flex;
  height: 100vh;
  background: var(--p-surface-ground);
}

.sidebar {
  width: 260px;
  background: var(--p-surface-card, #ffffff);
  border-right: 1px solid var(--p-surface-border, #f0f0f0);
  display: flex;
  flex-direction: column;
  transition: width 0.3s ease;
  position: relative;
}

.sidebar-collapsed {
  width: 70px;
}

.sidebar-header {
  padding: 1.5rem 1rem;
  border-bottom: 1px solid var(--p-surface-border);
}

.logo-container {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.logo {
  height: 2rem;
  width: auto;
  flex-shrink: 0;
}

.logo-text {
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--p-text-color);
  white-space: nowrap;
}

.sidebar-nav {
  flex: 1;
  overflow-y: auto;
  padding: 1rem 0;
}

.nav-section {
  margin-bottom: 2rem;
}

.section-title {
  font-size: 0.75rem;
  font-weight: 600;
  color: var(--p-text-muted-color);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  margin: 0 0 0.75rem 1rem;
}

.nav-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.nav-item {
  margin-bottom: 0.25rem;
}

.nav-link {
  display: flex;
  align-items: center;
  padding: 0.75rem 1rem;
  text-decoration: none;
  color: var(--p-text-color);
  transition: all 0.2s ease;
  border-radius: 0.375rem;
  margin: 0 0.5rem;
  position: relative;
}

.nav-link:hover {
  background: var(--p-surface-hover);
  color: var(--p-primary-color);
}

.nav-link.active {
  background: var(--p-primary-color);
  color: var(--p-primary-color-text);
}

.nav-icon {
  font-size: 1.125rem;
  width: 1.5rem;
  flex-shrink: 0;
}

.nav-label {
  margin-left: 0.75rem;
  font-weight: 500;
  white-space: nowrap;
}

.sidebar-footer {
  padding: 1rem;
  border-top: 1px solid var(--p-surface-border);
}

.profile-dropdown {
  width: 100%;
  border: none;
  background: transparent;
  box-shadow: none;
}

.profile-trigger {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.5rem;
  border-radius: 0.375rem;
  cursor: pointer;
  transition: background 0.2s ease;
}

.profile-trigger:hover {
  background: var(--p-surface-hover);
}

.profile-name {
  font-weight: 500;
  color: var(--p-text-color);
  flex: 1;
}

.profile-arrow {
  font-size: 0.875rem;
  color: var(--p-text-muted-color);
}

.profile-option {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.75rem;
  cursor: pointer;
  transition: background 0.2s ease;
}

.profile-option:hover {
  background: var(--p-surface-hover);
}

.collapse-toggle {
  position: absolute;
  top: 50%;
  right: -12px;
  transform: translateY(-50%);
  width: 24px;
  height: 24px;
  background: var(--p-primary-color);
  color: var(--p-primary-color-text);
  border: none;
  border-radius: 50%;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.75rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s ease;
}

.collapse-toggle:hover {
  transform: translateY(-50%) scale(1.1);
}

.main-content {
  flex: 1;
  padding: 2rem;
  overflow-y: auto;
  transition: margin-left 0.3s ease;
}

.content-expanded {
  margin-left: 70px;
}

.content-header {
  margin-bottom: 2rem;
}

.content-header h1 {
  font-size: 2rem;
  font-weight: 600;
  color: var(--p-text-color);
  margin: 0 0 0.5rem 0;
}

.content-header p {
  color: var(--p-text-muted-color);
  margin: 0;
}

.content-body {
  background: var(--p-surface-card);
  border-radius: 0.5rem;
  padding: 1.5rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

/* Responsive design */
@media (max-width: 768px) {
  .sidebar {
    position: fixed;
    left: 0;
    top: 0;
    z-index: 1000;
    height: 100vh;
  }
  
  .sidebar-collapsed {
    transform: translateX(-100%);
  }
  
  .main-content {
    margin-left: 0;
  }
  
  .content-expanded {
    margin-left: 0;
  }
}
</style>
<template>
    <div class="sidebar-layout">
        <!-- Sidebar -->
        <div class="sidebar" :class="{ 'sidebar-collapsed': isCollapsed }">
            <!-- Logo Section -->
            <div class="sidebar-header">
                <div class="logo-container">
                <svg width="35" height="40" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="logo">
                    <path
                    d="M25.87 18.05L23.16 17.45L25.27 20.46V29.78L32.49 23.76V13.53L29.18 14.73L25.87 18.04V18.05ZM25.27 35.49L29.18 31.58V27.67L25.27 30.98V35.49ZM20.16 17.14H20.03H20.17H20.16ZM30.1 5.19L34.89 4.81L33.08 12.33L24.1 15.67L30.08 5.2L30.1 5.19ZM5.72 14.74L2.41 13.54V23.77L9.63 29.79V20.47L11.74 17.46L9.03 18.06L5.72 14.75V14.74ZM9.63 30.98L5.72 27.67V31.58L9.63 35.49V30.98ZM4.8 5.2L10.78 15.67L1.81 12.33L0 4.81L4.79 5.19L4.8 5.2ZM24.37 21.05V34.59L22.56 37.29L20.46 39.4H14.44L12.34 37.29L10.53 34.59V21.05L12.42 18.23L17.45 26.8L22.48 18.23L24.37 21.05ZM22.85 0L22.57 0.69L17.45 13.08L12.33 0.69L12.05 0H22.85Z"
                    fill="var(--p-primary-color)"
                    />
                    <path
                    d="M30.69 4.21L24.37 4.81L22.57 0.69L22.86 0H26.48L30.69 4.21ZM23.75 5.67L22.66 3.08L18.05 14.24V17.14H19.7H20.03H20.16H20.2L24.1 15.7L30.11 5.19L23.75 5.67ZM4.21002 4.21L10.53 4.81L12.33 0.69L12.05 0H8.43002L4.22002 4.21H4.21002ZM21.9 17.4L20.6 18.2H14.3L13 17.4L12.4 18.2L12.42 18.23L17.45 26.8L22.48 18.23L22.5 18.2L21.9 17.4ZM4.79002 5.19L10.8 15.7L14.7 17.14H14.74H15.2H16.85V14.24L12.24 3.09L11.15 5.68L4.79002 5.2V5.19Z"
                    fill="var(--p-text-color)"
                    />
                </svg>
                <span v-if="!isCollapsed" class="logo-text">i-Card</span>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <ul class="nav-list">
                        <li v-for="item in navigationItems" :key="item.id" class="nav-item">
                        <a 
                            href="#" 
                            :class="['nav-link', { active: item.active }]"
                            @click.prevent="handleNavClick(item)"
                        >
                            <i :class="item.icon" class="nav-icon"></i>
                            <span v-if="!isCollapsed" class="nav-label">{{ item.label }}</span>
                        </a>
                        </li>
                    </ul>
                </div>

                <!-- Workspace Section -->
                <!-- <div class="nav-section" v-if="!isCollapsed">
                    <h3 class="section-title">WORKSPACE</h3>
                    <ul class="nav-list">
                        <li v-for="item in workspaceItems" :key="item.id" class="nav-item">
                        <a 
                            href="#" 
                            :class="['nav-link', { active: item.active }]"
                            @click.prevent="handleNavClick(item)"
                        >
                            <i :class="item.icon" class="nav-icon"></i>
                            <span class="nav-label">{{ item.label }}</span>
                        </a>
                        </li>
                    </ul>
                </div> -->
            </nav>

            <!-- Profile Section -->
            <div class="sidebar-footer">
                <Dropdown v-model="selectedProfile" :options="profileOptions" optionLabel="label" class="profile-dropdown">
                <template #value="slotProps">
                    <div class="profile-trigger">
                        <Avatar image="https://primefaces.org/cdn/primevue/images/avatar/amyelsner.png" shape="circle" size="small" />
                        <span v-if="!isCollapsed" class="profile-name">Profile</span>
                    </div>
                </template>
                <template #option="slotProps">
                    <div class="profile-option" @click="handleProfileAction(slotProps.option)">
                    <i :class="slotProps.option.icon"></i>
                    <span>{{ slotProps.option.label }}</span>
                    </div>
                </template>
                </Dropdown>
            </div>

            <!-- Collapse Toggle -->
            <button class="collapse-toggle" @click="toggleSidebar">
                <i :class="isCollapsed ? 'pi pi-chevron-right' : 'pi pi-chevron-left'"></i>
            </button>
        </div>

        <!-- Main Content Area -->
        <div class="main-content" :class="{ 'content-expanded': isCollapsed }">
            <router-view />
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useAuth } from "../../../composables/useAuth";
import router from "../../../router";

const { logoutUser } = useAuth();

const isCollapsed = ref(false);
const selectedProfile = ref(null);

// Main navigation items
const navigationItems = ref([
    {
        id: 'home',
        label: 'Home',
        icon: 'pi pi-home',
        active: true,
        action: 'home'
    },
    {
        id: 'projects',
        label: 'Projects',
        icon: 'pi pi-briefcase',
        active: false,
        action: 'projects'
    },
]);

// Workspace items
// const workspaceItems = ref([
//     {
//         id: 'members',
//         label: 'Members',
//         icon: 'pi pi-users',
//         active: false,
//         action: 'members'
//     },
//     {
//         id: 'integrations',
//         label: 'Integrations',
//         icon: 'pi pi-link',
//         active: false,
//         action: 'integrations'
//     },
//     {
//         id: 'settings',
//         label: 'Settings',
//         icon: 'pi pi-cog',
//         active: false,
//         action: 'settings'
//     }
// ]);

// Profile dropdown options
const profileOptions = ref([
    {
        label: 'Settings',
        icon: 'pi pi-cog',
        action: 'settings'
    },
    {
        label: 'Profile',
        icon: 'pi pi-user',
        action: 'profile'
    },
    {
        label: 'Logout',
        icon: 'pi pi-sign-out',
        action: 'logout'
    }
]);

// Toggle sidebar collapse
const toggleSidebar = () => {
  isCollapsed.value = !isCollapsed.value;
};

// Handle navigation clicks
const handleNavClick = (item) => {
  // Reset all items to inactive
  navigationItems.value.forEach(navItem => navItem.active = false);
//   workspaceItems.value.forEach(workItem => workItem.active = false);
  
  // Set clicked item as active
  item.active = true;
  
  switch (item.action) {
    case 'home':
        router.push('/dashboard');
        break;
    case 'projects':
        router.push('/dashboard/create-card');
        break;
    case 'members':
        console.log('Navigate to members');
        break;
    case 'integrations':
        console.log('Navigate to integrations');
        break;
    case 'settings':
        console.log('Navigate to settings');
        break;
    default:
        onsole.log('Unknown action:', item.action);
  }
};

// Handle profile dropdown actions
const handleProfileAction = async (option) => {
    console.log('Profile action:', option.action);
    
    switch (option.action) {
        case 'settings':
            console.log('Navigate to settings');
        break;
        case 'profile':
            console.log('Navigate to profile');
        break;
        case 'logout':
            try {
                await logoutUser();
            } catch (error) {
                console.error('Logout failed:', error);
            }
        break;
    }
    
    selectedProfile.value = null;
};
</script>