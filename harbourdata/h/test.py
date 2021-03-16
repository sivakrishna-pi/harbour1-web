from keystoneauth1 import loading
from keystoneauth1 import session
from novaclient import client as novaclient
from neutronclient.v2_0 import client as neutronClient
import os
import sys
import time
authurl = "http://pistack.picloud.in:5000/v3"
user_name = "admin"
pass_word = "admin123"
project_name ="admin"
domain_name="default"
pdomain_name="default"
loader = loading.get_plugin_loader('password')
auth = loader.load_from_options(auth_url=authurl,username=user_name,password=pass_word,project_name=project_name,user_domain_id=domain_name,project_domain_name=pdomain_name)
sess = session.Session(auth=auth)
def FindImage(image_name):
    try:
        nt.images.find(name=image_name)
        print "Image is Found."
        return True
    except Exception as e_image:
        print e_image
        return False
def FindFlavor(flavor_name):
    try:
        nt.flavors.find(name=flavor_name)
        print "Flavor is Found."
        return True
    except Exception as e_flavor:
        print e_flavor
        return False
def FindKeyPair(keypair_name):
    try:
        nt.keypairs.find(name=keypair_name)
        print "Keypair is Found."
        return True
    except Exception as e_keypair:
        print e_keypair
        return False
def FindSecurityGroup(security_group_name):
    try:
        nt.security_groups.find(name=security_group_name)
        print "Security group is Found."
        return True
    except Exception as e_security_group:
        print e_security_group
        return False
def FindNetwork(network_name):
    try:
        nt.networks.find(label=network_name)
        print "Network is Found."
        return True
    except Exception as e_network:
        print e_network
        return False
def FindSubnet(network_name,cidr_block):
    network = neutronConnection.list_networks(name=network_name)['networks'][0]
    subnet = neutronConnection.list_subnets(network_id = network['id'])['subnets']
    count=0
    for i in range(len(subnet)):
        if subnet[i]["cidr"]==cidr_block:
            count+=1
    if count>0:
        print "Subnet is Found."
        return True
    else:
        print "Subnet is not Found."
        return False
def FindRouter(router_name):
    router = neutronConnection.list_routers(name = router_name)['routers']
    if len(router)!=0:
        print "Router Found."
        return True
    else:
        print "Router Not Found."
        return False
def FindInterface(network_name,cidr_block,router_name,public_network):
    network = neutronConnection.list_networks(name=network_name)['networks'][0]
    subnet = neutronConnection.list_subnets(network_id = network['id'])['subnets']
    for i in range(len(subnet)):
        if subnet[i]["cidr"]==cidr_block:
            subnet=subnet[i]
            break
    router = neutronConnection.list_routers(name = router_name)['routers'][0]
    ports = neutronConnection.list_ports()["ports"]
    count=0
    for i in range(len(ports)):
        if ports[i]["device_owner"]=="network:router_interface":
            if str(ports[i]["fixed_ips"][0]["subnet_id"]) == str(subnet["id"]):
                count+=1
    if count>0:
        print "Interface Found."
        return True
    else:
        print "Interface Not Found."
        return False
def CreateSecurityGroup(security_group_name,security_group_description):
    try:
        nt.security_groups.create(name=security_group_name,description=security_group_description)
        print "Security Group is Created."
    except Exception as e_security_group_create:
        print e_security_group_create
        exit(0)
    secgroup=nt.security_groups.find(name=security_group_name)
    try:
        nt.security_group_rules.create(secgroup.id,ip_protocol="icmp",from_port=-1,to_port=-1)
        print "Security Group rules are created."
    except Exception as e_security_group_rules_create:
        print e_security_group_rules_create
        exit(0)
    return True
def CreateKeyPair(keypair_name):
    path_to_keypairs = "C:/Users/vinodh.basavani/Desktop/keys/id.pub"
    try:
        with open(os.path.expanduser(path_to_keypairs),'r') as content:
            print "Public key is Found."
            try:
                nt.keypairs.create(name=keypair_name,public_key=content.read())
                print "Keypair is Created."
                return True
            except Exception as e_keypair_create:
                print e_keypair_create
                return False
    except Exception as no_pub_key:
        print no_pub_key
        return False
def CreateSubnet(network_name,cidr_block):
    network = neutronConnection.list_networks(name=network_name)['networks'][0]
    try:
        neutronConnection.create_subnet( { 'subnet' : { 'network_id' : network['id'], 'ip_version' : 4, 'cidr' : cidr_block } } )
        print "Subnet is Created."
    except Exception as e_subnet:
        print e_subnet
        exit(0)
    return True
def CreateRouter(router_name):
    try:
        router = neutronConnection.create_router( { 'router' : { 'name' : router_name } } )
        print "Router is Created."
    except Exception as e_router:
        print e_router
        exit(0)
    return True
def CreateInterface(network_name,cidr_block,router_name):
    network = neutronConnection.list_networks(name=network_name)['networks'][0]
    subnet = neutronConnection.list_subnets(network_id = network['id'])['subnets']
    for i in range(len(subnet)):
        if subnet[i]["cidr"]==cidr_block:
            subnet=subnet[i]
            break
    router = neutronConnection.list_routers(name = router_name)['routers'][0]
    try:
        neutronConnection.add_interface_router(router['id'], { 'subnet_id' : subnet['id'] } )
        print "Interface is added to Router"
    except Exception as e_interface:
        print e_interface
        exit(0)
    return True
def CreateGateway(router_name,public_network):
    router = neutronConnection.list_routers(name = router_name)['routers'][0]
    try:
        neutronConnection.add_gateway_router(router['id'], { 'network_id' : neutronConnection.list_networks(name = public_network)['networks'][0]['id'] } )
        print"Gateway is added to the router."
    except Exception as e_public_network:
        print e_public_network
        exit(0)
    return True
def CreateFloatingIp():
    try:
        floating_ip = nt.floating_ips.create(nt.floating_ip_pools.list()[0].name)
        print "Floating IP is created."
        return floating_ip.ip
    except Exception as e_floating_ip:
        print e_floating_ip
        return False
nt = novaclient.Client("2",session=sess)
neutronConnection = neutronClient.Client(session=sess)
image_name="Pi_cirros"
flavor_name="m1.tiny"
keypair_name="demo"
network_name = "INSTANCE_NETWORK"
cidr_block = "10.0.12.0/24"
public_accessible = True
router_name = "ROUTER"
public_network = "Floating_IP"
instance_name = "demo-1"
security_group_name="demo"
security_group_description="demo"
floating_ip_need=True
if not(FindImage(image_name)) and not(FindFlavor(flavor_name)):
    print "No image or No flavor."
    exit(0)
if not(FindKeyPair(keypair_name)):
    print "Keypair is Creating.."
    rs_keypair = CreateKeyPair(keypair_name)
    if rs_keypair != True:
        exit(0)
if not(FindSecurityGroup(security_group_name)):
    print "Security group is Creating.."
    rs_security_group = CreateSecurityGroup(security_group_name,security_group_description)
    if rs_security_group != True:
        exit(0)
if not(FindNetwork(network_name)):
    print "Network is Creating.."
    rs_network=CreateNetwork(network_name,cidr_block,router_name,public_network,public_accessible)
    if rs_network != True:
        exit(0)
if not(FindSubnet(network_name,cidr_block)):
    print "Subnet is Creating in the Network.."
    rs_subnet = CreateSubnet(network_name,cidr_block)
    if rs_subnet != True:
        exit(0)
if public_accessible:
    if not(FindRouter(router_name)):
        print "Router is Creating.."
        rs_router = CreateRouter(router_name)
        if rs_router != True:
            exit(0)
        else:
            rs_gateway = CreateGateway(router_name,public_network)
            if rs_gateway != True:
                exit(0)
    if not(FindInterface(network_name,cidr_block,router_name,public_network)):
        rs_interface = CreateInterface(network_name,cidr_block,router_name)
        if rs_interface != True:
            exit(0)
image = nt.images.find(name=image_name)
flavor = nt.flavors.find(name=flavor_name)
keypair = nt.keypairs.find(name=keypair_name)
security_group = nt.security_groups.find(name=security_group_name)
network1 = neutronConnection.list_networks(name=network_name)['networks'][0]
subnet = neutronConnection.list_subnets(network_id = network1['id'])['subnets']
network = nt.networks.find(label=network_name)
for i in range(len(subnet)):
    if subnet[i]["cidr"]==cidr_block:
        subnet=subnet[i]
        break
instance = nt.servers.create(name=instance_name,image=image,flavor=flavor,key_name=keypair.name,nics=[{'net-id':network.id}],security_groups=[security_group_name])
status = instance.status
sys.stdout.write("Building...")
while status == "BUILD":
    time.sleep(1)
    sys.stdout.write(".")
    sys.stdout.flush()
    instance=nt.servers.get(instance.id)
    status = instance.status
print "\n"
print "Instance is Running."
instance_id = nt.servers.get(instance.id)
if floating_ip_need:
    floating_ip=CreateFloatingIp()
    if floating_ip:
        instance_id.add_floating_ip(floating_ip)
        print "Floating IP is attached to the Instance."
    else:
        print "Unable to Create Floating IP"
print "List of Availible Virtual Machines."
print nt.servers.list()


