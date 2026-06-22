const dialogueData1 = {
    initial: {
        text: "Hello!<br>Welcome to <br> Topic 1:Introduction to Information System",
        options: [
            { text: "What is a System?", next: "first" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    first: {
        text: "System is a set of related components that produces specific results. <br>Moreover, businesses use many types of systems to operate their daily businesses such as inventory control, human resources, account and so on.<br> These information system can handle day to day task as well as help managers to perfom better decisions making",
        options: [
            { text: "Tell me more", next: "second" },
            { text: "Back", next: "initial" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    second: {
        text: "There are 5 components of Information System, they are:<br> Hardware, Software, Data, Process, and People",
        options: [
            { text: "Tell me about Hardware", next: "third" },
            { text: "Tell me about Software", next: "third1" },
            { text: "Tell me about Data", next: "third2" },
            { text: "Tell me about Process", next: "third3" },
            { text: "Tell me about People", next: "third4" },
            { text: "Back", next: "first" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    third: {
        text: "Hardware is the physical layer of the information system.<br> Hardware examples can include:<br> servers, workstations, networks, scanners, telecommunications equipment, mobile devices and so on.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third1: {
        text: "Software are programs that control the hardware and produce the desired information or results. <br>System software:<br> Operating System, Security System, and Device Drivers <br>Application Software:<br> Enterprise Application, Legacy System, Horizontal System, and Vertical System",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third2: {
        text: "Data are raw facts that an Information System transforms into useful information. <br>Data has no inherent meaning and cannot be used for making decision.<br> Data must be accurate, relavance, reliable, complete, and timely before turning into usefull information.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third3: {
        text: "Process can be described as tasks and business functions that users, managers, and IT staff members perform to achieve specific results.<br> For example, generating reports, accounting, uploading documents and so on.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third4: {
        text: "People can be described as someone having an interest in an Information System.<br> A user is a person who communicates with an Information System or uses the information that it generates.<br> For example, stakesholders, customers, accountant, managers and so on.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    End: {
        text: "Thanks for learning about Topic 1 of Information System",
        options: [
            { text: "Back", next: "initial" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    }
};

const dialogueData2 = {
    initial: {
        text: "Hello!<br>Welcome to <br> Topic 2:Software Engineering",
        options: [
            { text: "What is a Software?", next: "first" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    first: {
        text: "Software is a set of instructions, data or programs used to operate computers and execute specific tasks. Refer to applications, scripts and programs that run on a device",
        options: [
            { text: "Tell me more", next: "second" },
            { text: "Back", next: "initial" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    second: {
        text: "An engineering discipline that is concerned with all aspects of software production from the early stages of system specification through to maintaining the system after it has gone into use.",
        options: [
            { text: "System Software", next: "third" },
            { text: "Buisness Software", next: "third1" },
            { text: "Artificial Intelligence Software", next: "third2" },
            { text: "Real Time Software", next: "third3" },
            { text: "Application Software", next: "third4" },
            { text: "Web-Based Software", next: "third5" },
            { text: "Embedded Software", next: "third6" },
            { text: "Back", next: "first" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    third: {
        text: "System software are usually engaged in background processes, it act as a middle layer between hardware and user applications. There are the category of system software, Operating System, Transalator, and Utility Program.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third1: {
        text: "Programs that support day by day business functions and provide users with the information they need.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third2: {
        text: "Programs that monitor, analyze and control real world events as they occurs. Example: Weather forecasting software. The software will gather and process the status of temperature, humidity and other environmental parameters to forecast the weather.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third3: {
        text: "Software that is embedded in hardware or non-PC device. It is written specifically for the specific hardware that it runs on. Usually has processing and memory constraints because of the device's limited computing capabilities.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third4: {
        text: "Programs that makes use of Artificial Intelligence techniques methods to solve complex program. Active areas are expert system, pattern recognition, games and others.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third5: {
        text: "Program that access, analyze and process business information. Example: payroll, account receivable or payable, inventory, point-of-sales and others.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third6: {
        text: "Programs that support internet access and application. Example: search engines, web browser, e-commerce software and others.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    
    End: {
        text: "Thanks for learning about Topic 2 of Software Engineering",
        options: [
            { text: "Back", next: "initial" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    }
};

const dialogueData3 = {
    initial: {
        text: "Hello!<br>Welcome to <br> Topic 3:Methodology",
        options: [
            { text: "What is a Methodology?", next: "first" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    first: {
        text: "Software engineering methodologies are important for creating better software projects. It helps developers plan, produce, and test software. These methods simplify tasks, improve collaboration, and achieve timely and budget-friendly outcomes.",
        options: [
            { text: "Tell me more", next: "second" },
            { text: "Back", next: "initial" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    second: {
        text: "An engineering discipline that is concerned with all aspects of software production from the early stages of system specification through to maintaining the system after it has gone into use.",
        options: [
            { text: "Waterfall Model", next: "third" },
            { text: "Prototyping", next: "third1" },
            { text: "Boehm's Spiral Model", next: "third2" },
            { text: "Rational Unified Process", next: "third3" },
            { text: "Rapid Application Development", next: "third4" },
            { text: "Back", next: "first" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    third: {
        text: "The waterfall model is the classic process, it is one of the first model to be introduce. It is widely known, understood and used. In some respect, waterfall is the ”common sense” approach.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third1: {
        text: "A sample, model or release of a product built to test process to be replicated, the goal of prototyping is to evaluate an idea. It is iterative, trial and error process that takes place between developers and the users.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third2: {
        text: "Process is represented as a spiral rather than as a sequence of activities with backtracking.Each loop in the spiral represents a phase in the process. No fixed phases such as specification or design - loops in the spiral are chosen depending on what is required.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third3: {
        text: "A modern generic process derived from the work on the UML and associated process. Brings together aspects of the 3 generic process models discussed previously.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third4: {
        text: "Object-oriented approach to systems development that includes a method of development as well as software tools. It enable software to be developed in a shorter time frame and sometimes with a higher quality.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    
    End: {
        text: "Thanks for learning about Topic 3 of Methodology",
        options: [
            { text: "Back", next: "initial" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    }
};

const dialogueData4 = {
    initial: {
        text: "Hello!<br>Welcome to <br> Topic 4:Planning",
        options: [
            { text: "What is a Planning?", next: "first" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    first: {
        text: "Systems planning phase is the fundamental process of understanding why an information system should be built and determine how the project team will go about building it.",
        options: [
            { text: "Tell me more about project initiation.", next: "second" },
            { text: "Back", next: "initial" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    second: {
        text: "Begins when someone in an organization identifies that there is a need to improve an existing system or a new system is needed to improve business operations. Most ideas come from outside the IT department such as marketing, accounting, and etc., as a form of systems request.",
        options: [
            { text: "System Request?", next: "third" },
            { text: "System Request Forms", next: "third1" },
            { text: "Preliminary Investigation", next: "third2" },
            { text: "Project Objective", next: "third3" },
            { text: "Project Management Tools", next: "third4" },
            { text: "Back", next: "first" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    third: {
        text: "Every organization has its own way of initiating a project, but most start with a technique called systems request. Systems request documents the business reasons for building the system and the value that the system is expected to provide.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third1: {
        text: "A system request form should follow have streamlines the request process, esure consistency, easy to understand, and clear instructions",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third2: {
        text: "A systems analyst conducts a preliminary investigation to study the systems request and recommend specific action. The analyst gather facts about the problem or opportunity, project scope and constraints, project benefits and estimated development time and cost.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third3: {
        text: "Problem Statement or issues are followed by a series of objectives, or goals that match the issues point by point. Issues are the current situation; objectives are the desired situation. The objectives may be very specific or worded using a general statement. After the objectives are stated, the relative importance of the issues or objectives must be determined, the identification of the most critical objectives is best done by users.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third4: {
        text: "There are 2 suggested tools you may use for managing your project<br><br>Gantt Chart: a horizontal bar chart that graphically displays the time relationships between the different tasks in a project. Effective when seeking to communicate schedule<br><br>Suggest Tool: MS Project",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    
    End: {
        text: "Thanks for learning about Topic 4 of Planning",
        options: [
            { text: "Back", next: "initial" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    }
};

const dialogueData5 = {
    initial: {
        text: "Hello!<br>Welcome to <br> Topic 5:Analysis Requirement",
        options: [
            { text: "What is a Requirement Analysis?", next: "first" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    first: {
        text: "Requirement Analysis is a Fact-Finding Process, Requirement Elicitation. Purpose: To find or gather requirements for a system to be developed. Perform analysis after all requirement are gathering using analysing tools such as spreedsheets, word processing and presentations.",
        options: [
            { text: "Tell me more", next: "second" },
            { text: "Back", next: "initial" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    second: {
        text: "In this topic there are 6 Fact-Finding techniques we can use to perform requirement analyst such as Interview, Document Review, Observation, Sampling, Research, and Surveys",
        options: [
            { text: "Interview", next: "third" },
            { text: "Document Review", next: "third1" },
            { text: "Observation", next: "third2" },
            { text: "Sampling", next: "third3" },
            { text: "Research", next: "third4" },
            { text: "Surveys", next: "third5" },
            { text: "Types of requirement", next: "third6" },
            { text: "Back", next: "first" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    third: {
        text: "During Interview, you can perform information-gathering from another person. It involves directed conversation with a specific-purpose that uses a question and answer format.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third1: {
        text: "Document review aims find out the information requirements that people have in the current system.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third2: {
        text: "Observation aim is to see what really happens, not what people say happens, can be open-ended or based on a schedule. You may also consider the Hawthorne Effect during obeservation<br><br>Hawthrone Effect - Productivity seemed to improve whenever workers knew they were being observed",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third3: {
        text: "Sampling also known as purposive and selective sampling, purposeful sampling is a sampling technique that qualitative researchers use to recruit participants who can provide in-depth and detailed information about the phenomenon under investigation.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third4: {
        text: "Research can be accomplished through organization's documentation, report and so on.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third5: {
        text: "Surveys aims to obtain the views of a large number of people in a way that can be analyzed statistically.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third6: {
        text: "When gathering requirement we need to identify different type of requirements needed by the system and stakesholders. For example, buisness, system, user, security, funtional, non-functional, architerctural and user interface requirement.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    
    End: {
        text: "Thanks for learning about Topic 5 of Analysis Requirement",
        options: [
            { text: "Back", next: "initial" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    }
};

const dialogueData6 = {
    initial: {
        text: "Hello!<br>Welcome to <br> Topic 6:Feasibility Study",
        options: [
            { text: "What is a Feasibility Study?", next: "first" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    first: {
        text: "Feasibility Study is use to determine whether a project has a reasonable chance of success.",
        options: [
            { text: "Tell me more", next: "second" },
            { text: "Back", next: "initial" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    second: {
        text: "In this topic there are many types of Feasibility, which one would you learn more about",
        options: [
            { text: "Technical", next: "third" },
            { text: "Operational", next: "third1" },
            { text: "Schedule", next: "third2" },
            { text: "Economic", next: "third3" },
            { text: "Back", next: "first" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    third: {
        text: "Techinical Feasibility is a process of determining whether the organization has the technology resources to develop or purchase, install, and operate the system. For example, <br>Q: Is the proposed technology or solution practical?<br>A: Yes, similar system is widely used in other universities.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third1: {
        text: "Operational Feasibility is the process of assessing the degree to which a proposed system solves business problems or takes advantage of business opportunities.<br>Refers to a system that users will accept and use effectively to support business objectives.<br>The PIECES framework can help identify operational problems to be solved and their urgency.",
        options: [
            { text: "PIECE Framework", next: "third5" },
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third2: {
        text: "Schedule Feasibility is a process of assessing the degree to which the potential time frame and completion dates for all major activities within a project meet organizational deadlines and constraints for affecting change. For example, <br>Q: How much time is given for the project by customer?<br>A: Estimated 6 Weeks.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third3: {
        text: "To concludes if the project can be done within the given budget and to determine the cost and benefit (including profit) from the project. For example, <br>Q: Does the organization have adequate cash flow to fund the project during the development period?<br>A: Yes, the organization have enough cash flow during the development period.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third5: {
        text: "PIECES Framework contain 6 important requirement to analysis. For example, Performance, Information, Economy, Control, Efficiency, and Services.Using the PIECES framework allows analysts to systematically review and assess each aspect of a system, identifying areas for improvement and ensuring that the system aligns with organizational goals and user requirements.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    End: {
        text: "Thanks for learning about Topic 6 of Feasibility Study",
        options: [
            { text: "Back", next: "initial" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    }
};

const dialogueData7 = {
    initial: {
        text: "Hello!<br>Welcome to <br> Topic 7:Protoyping and UI",
        options: [
            { text: "What is a User Inferface Design?", next: "first" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    first: {
        text: "User interface (UI) prototyping is an early phase of UI development where you create a digital mock-up of a future customer-facing interface.",
        options: [
            { text: "Tell me more", next: "second" },
            { text: "Back", next: "initial" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    second: {
        text: "In this topic there are many design and protoyping concept",
        options: [
            { text: "Logical Design", next: "third" },
            { text: "Physical Design", next: "third1" },
            { text: "Input Devices", next: "third2" },
            { text: "Input Design Objectives", next: "third3" },
            { text: "Types of Output Report Design", next: "third4" },
            { text: "Output Design Onject", next: "third5" },
            { text: "Back", next: "first" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    third: {
        text: "Logical or conceptual relationships among the components of the IS, it defines all input, output and process of the system.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third1: {
        text: "A plan for the actual implementations of the logical design of the system describes the implementation of all components of the Information Systems Logical or conceptual relationships among the components of the IS, it defines all input, output and process of the system.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third2: {
        text: "Input devices can be very traditional, or based on the latest technology. Such as keyboard, mouse, trackpad and so on.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third3: {
        text: "When design your buttons, fill in form and so you may apply the following concept to imporve user experiences. For example, Ease of Use, Accuracy, Effectiveness, Attractiveness, Simplicity, and Consistency.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third4: {
        text: "Type of Report <br> Detail Report: Use to Produces one or more lines of output for each record processed and can be quite lengthy<br>Eception Report: Displays only those records that meet a specific condition or conditions, contan suffiecient Information for decision making.<br>Summary Report: Upper-level managers often want to see total figures and do not need supporting details, short and straightforward.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third5: {
        text: "When design your reports, output processes and so you may apply the following concept to imporve user experiences. For example, Ease of View, Accuracy, Repeating Fields, Page Headers and Footers, Simplicity, and Consistency.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    
    End: {
        text: "Thanks for learning about Topic 7 of Prototyping and UI Design",
        options: [
            { text: "Back", next: "initial" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    }
};

const dialogueData8 = {
    initial: {
        text: "Hello!<br>Welcome to <br> Topic 8:Implementation and Testing",
        options: [
            { text: "What is a Coding Standards?", next: "first" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    first: {
        text: "Code not only needs to do its job well, but must also be easy to add to, maintain and debug. Needing to make changes to code could require a lot of energy to decipher lines of code that doesn’t make its purpose or intentions clear. Neatly commented with details that explain any complicated constructs and the reasoning behind them.",
        options: [
            { text: "Why need coding standards?", next: "second" },
            { text: "Back", next: "initial" },
            { text: "That's all", next: "End" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    second: {
        text: "By following coding standards, it helps to make ur code have consistent look, imporve the readability, simplifies copying, editing, and maintance, and company wide standaziations. What else would you like to learn?",
        options: [
            { text: "Principle of Good Coding", next: "third" },
            { text: "Code Smells", next: "third1" },
            { text: "Refactoring", next: "third2" },
            { text: "Software Testing", next: "third3" },
            { text: "Unit Testing", next: "third4" },
            { text: "System Testing", next: "third5" },
            { text: "Integration Testing", next: "third6" },
            { text: "Back", next: "first" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    },
    third: {
        text: "KISS - Keep It Short and Simple<br>DRY - Don't Repeat Yourself<br>Abstraction - Each significant piece of functionality in a program should be implemented in just one place in the source code<br>Maximize Coupling - Minimize the dependencies on other areas of code<br>Maximize Cohension - Similar functionality should be in same components<br>Open/Closed Principle - Software entities should be open for extension, but closed for modification",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third1: {
        text: "Code smells is any characteristic in the source code of a program that possibly indicates a deeper problem. For example, Duplicated Code, Large Classes, Long Methods, and Long Parameter List.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third2: {
        text: "Improve your software internal structure in a safe way while not changing / adding / removing behavior or external interfaces. +readable code, +simplified code, +easier to change, +easier to add new value, +reduced redundancy, advices how to go on to keep-improve software, and last but not least +automatic tests.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third3: {
        text: "Software Testing is the process of exercising a program with the specific intent of finding errors prior to delivery to the end user. Each program must tested to make sure it functions correctly. For example, Desk checking : the process of reviewing the program code to spot logic errors, which produce incorrect result.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third4: {
        text: "Unit Testing is a testing of an individual program or modul, its objective is to identify and eliminate execution errors that could cause the program to terminate abnormally, and logic errors that could have been missed during desk checking.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third5: {
        text: "System Testing verify that all system components are integrated properly and that actual processing situations will be handled correctly. Confirm that the information system can handle predicted volumes of data in a timely and efficient manner.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    third6: {
        text: "Integration Testing is a testing two or more programs that depend on each other to make sure that the programs work together properly.",
        options: [
            { text: "Back", next: "second" },
            { text: "That's all", next: "End" }
        ]
    },
    
    End: {
        text: "Thanks for learning about Topic 8 of Implementation and Testing",
        options: [
            { text: "Back", next: "initial" },
            { text: "Take me to the quiz", next: "gamepage.html" }
        ]
    }
};